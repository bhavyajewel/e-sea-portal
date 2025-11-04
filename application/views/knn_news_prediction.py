import sys
import pandas as pd
from sklearn.neighbors import KNeighborsClassifier
from sklearn.preprocessing import StandardScaler
import mysql.connector
import matplotlib.pyplot as plt
from sqlalchemy import create_engine
from datetime import datetime

# ---- STEP 1: Safely collect input arguments ----
try:
    news_text = sys.argv[1]
    date_input = sys.argv[2]
except IndexError:
    print("Usage: python knn_news_prediction.py <news_text> <date>")
    sys.exit(1)

# ---- STEP 2: Connect to MySQL ----
engine = create_engine("mysql+mysqlconnector://root:@localhost/eseaport")

# ---- STEP 3: Read data ----
query = "SELECT News, Date, Length, Trending FROM news_data"
df = pd.read_sql(query, engine)

# ---- STEP 4: Preprocess ----
df['Date'] = pd.to_datetime(df['Date'])
df['Days_Since'] = (datetime.now() - df['Date']).dt.days
X = df[['Length', 'Days_Since']]
y = df['Trending']

# ---- STEP 5: Train KNN model ----
scaler = StandardScaler()
X_scaled = scaler.fit_transform(X)

model = KNeighborsClassifier(n_neighbors=3)
model.fit(X_scaled, y)

# ---- STEP 6: Prepare new input ----
news_length = len(news_text.split())
date_val = datetime.strptime(date_input, "%Y-%m-%d")
days_since = (datetime.now() - date_val).days
X_new = scaler.transform([[news_length, days_since]])

# ---- STEP 7: Predict ----
prediction = model.predict(X_new)
result = "Trending" if prediction[0] == 1 else "Not Trending"

print(f"\nNews Prediction Result → {result}\n")

# ---- STEP 8: Visualize ----
plt.scatter(df['Length'], df['Days_Since'], c=df['Trending'], cmap='coolwarm')
plt.xlabel("News Length (words)")
plt.ylabel("Days Since Published")
plt.title("KNN News Trending Prediction")
plt.savefig("knn_news_prediction_plot.png")
plt.show()
