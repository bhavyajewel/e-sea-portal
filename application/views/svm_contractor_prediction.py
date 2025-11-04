import sys
import pandas as pd
from sklearn.svm import SVC
from sklearn.preprocessing import LabelEncoder, StandardScaler
import mysql.connector
from sqlalchemy import create_engine
import matplotlib.pyplot as plt

# ---- STEP 1: Safely collect inputs ----
try:
    age = int(sys.argv[1])
    gender = sys.argv[2].lower()
    experience = int(sys.argv[3])
except IndexError:
    print("Usage: python svm_contractor_prediction.py <age> <gender> <experience>")
    sys.exit(1)
except ValueError:
    print("Error: Age and Experience must be numeric.")
    sys.exit(1)

# ---- STEP 2: Connect to Database ----
engine = create_engine("mysql+mysqlconnector://root:@localhost/eseaport")

# ---- STEP 3: Fetch Data ----
query = "SELECT Age, Gender, Experience, Eligible FROM contractor_data"
df = pd.read_sql(query, engine)

# ---- STEP 4: Preprocess ----
le = LabelEncoder()
df['Gender'] = le.fit_transform(df['Gender'])  # male=1, female=0
X = df[['Age', 'Gender', 'Experience']]
y = df['Eligible']

# Scale the features
scaler = StandardScaler()
X_scaled = scaler.fit_transform(X)

# ---- STEP 5: Train SVM Model ----
model = SVC(kernel='linear')
model.fit(X_scaled, y)

# ---- STEP 6: Predict ----
input_gender = le.transform([gender])[0]
X_new = scaler.transform([[age, input_gender, experience]])
prediction = model.predict(X_new)
result = "Eligible" if prediction[0] == 1 else "Not Eligible"

print(f"\nContractor Prediction Result → {result}\n")

# ---- STEP 7: Plot ----
plt.scatter(df['Experience'], df['Age'], c=df['Eligible'], cmap='coolwarm')
plt.xlabel("Experience (Years)")
plt.ylabel("Age")
plt.title("SVM Contractor Eligibility Prediction")
plt.savefig("svm_contractor_plot.png")
plt.show()
