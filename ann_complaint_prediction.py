import sys
import pandas as pd
import numpy as np
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
from tensorflow.keras.utils import to_categorical
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.feature_extraction.text import CountVectorizer
from sqlalchemy import create_engine
import matplotlib.pyplot as plt

# ---- Database Connection ----
engine = create_engine('mysql+mysqlconnector://root:@localhost/eseaport')

# ---- Load Complaint Data ----
query = "SELECT id, subject, complaints FROM complaint"
df = pd.read_sql(query, con=engine)

# ---- Handle Missing Data ----
df = df.dropna(subset=['complaints'])
df['complaints'] = df['complaints'].astype(str)

# ---- Example Categories (for demo/training) ----
# In a real system, you can replace this with labeled complaint data.
np.random.seed(42)
df['category'] = np.random.choice(['Service', 'Delay', 'Damage', 'Payment'], len(df))

# ---- Convert Text to Features ----
vectorizer = CountVectorizer(max_features=1000)
X = vectorizer.fit_transform(df['complaints']).toarray()

# ---- Encode Labels ----
label_encoder = LabelEncoder()
y_encoded = label_encoder.fit_transform(df['category'])
y_categorical = to_categorical(y_encoded)

# ---- Train-Test Split ----
X_train, X_test, y_train, y_test = train_test_split(X, y_categorical, test_size=0.2, random_state=42)

# ---- ANN Model ----
model = Sequential([
    Dense(128, input_dim=X_train.shape[1], activation='relu'),
    Dense(64, activation='relu'),
    Dense(y_categorical.shape[1], activation='softmax')
])

model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

# ---- Train with History (for plotting) ----
history = model.fit(X_train, y_train, epochs=10, batch_size=8, verbose=1, validation_data=(X_test, y_test))

# ---- Evaluate ----
loss, acc = model.evaluate(X_test, y_test, verbose=0)
print(f"\nModel Accuracy: {acc*100:.2f}%")

# ---- Plot Training History ----
plt.plot(history.history['accuracy'], label='Training Accuracy')
plt.plot(history.history['val_accuracy'], label='Validation Accuracy')
plt.title("ANN Model Accuracy over Epochs")
plt.xlabel("Epoch")
plt.ylabel("Accuracy")
plt.legend()
plt.savefig("ann_accuracy.png")
plt.show()

# ---- Prediction for New Complaint ----
if len(sys.argv) > 2:
    complaint_id = sys.argv[1]
    complaint_text = sys.argv[2]

    complaint_vec = vectorizer.transform([complaint_text]).toarray()
    prediction = model.predict(complaint_vec)
    predicted_label = label_encoder.inverse_transform([np.argmax(prediction)])[0]
    confidence = float(np.max(prediction))

    print(f"\nPredicted Category: {predicted_label}")
    print(f"Confidence: {confidence:.2f}")

    # ---- Insert Prediction into Database ----
    engine.execute(
        f"INSERT INTO complaint_analysis (complaint_id, subject, complaint_text, predicted_category, confidence) "
        f"VALUES (NULL, '{complaint_id}', '{complaint_text}', '{predicted_label}', {confidence})"
    )

else:
    print("\nUsage: python ann_complaint_prediction.py <complaint_id> '<complaint_text>'")
