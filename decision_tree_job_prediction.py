import sys
import pandas as pd
from sklearn.tree import DecisionTreeClassifier
import mysql.connector
from sqlalchemy import create_engine
import matplotlib.pyplot as plt

# ---- STEP 1: Safely collect inputs from PHP or CLI ----
try:
    qualification = int(sys.argv[1])
    experience = int(sys.argv[2])
    skill_score = int(sys.argv[3])
except IndexError:
    print("Error: Missing arguments. Usage: python decision_tree_job_prediction.py <qualification> <experience> <skill_score>")
    sys.exit(1)
except ValueError:
    print("Error: All arguments must be numeric.")
    sys.exit(1)

# ---- STEP 2: Connect to MySQL via SQLAlchemy ----
engine = create_engine("mysql+mysqlconnector://root:@localhost/eseaport")

# ---- STEP 3: Load training data ----
query = "SELECT Qualification, Experience, Skill_Score, Eligible FROM applicants"
df = pd.read_sql(query, engine)

# ---- STEP 4: Train Decision Tree ----
X = df[['Qualification', 'Experience', 'Skill_Score']]
y = df['Eligible']

model = DecisionTreeClassifier()
model.fit(X, y)

# ---- STEP 5: Predict ----
prediction = model.predict([[qualification, experience, skill_score]])
result = "Eligible" if prediction[0] == 1 else "Not Eligible"

print(result)

# ---- STEP 6: Plot Feature Importance ----
importance = model.feature_importances_
features = ['Qualification', 'Experience', 'Skill_Score']

plt.figure(figsize=(6, 4))
plt.bar(features, importance, color='skyblue', edgecolor='black')
plt.title("Feature Importance in Job Eligibility Prediction")
plt.ylabel("Importance Score")
plt.tight_layout()
plt.savefig("feature_importance.png")   # saves chart to project folder
plt.show()

# ---- STEP 7: Optional: Close DB Connection ----
engine.dispose()
