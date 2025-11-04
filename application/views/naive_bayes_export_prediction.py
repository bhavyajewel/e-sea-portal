import sys
import pandas as pd
import mysql.connector
from sqlalchemy import create_engine
from sklearn.naive_bayes import GaussianNB
import matplotlib.pyplot as plt

# ---- STEP 1: Safely collect inputs from PHP or CLI ----
try:
    product_quantity = int(sys.argv[1])
    source = sys.argv[2]
    destination = sys.argv[3]
except IndexError:
    print("Error: Missing arguments. Usage: python naive_bayes_export_prediction.py <product_quantity> <source> <destination>")
    sys.exit(1)

# ---- STEP 2: Connect to MySQL ----
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="eseaport"
)

# Use SQLAlchemy for pandas compatibility
engine = create_engine("mysql+mysqlconnector://root:@localhost/eseaport")

# ---- STEP 3: Fetch training data ----
query = "SELECT Product_Quantity, Source, Destination, Export_Success FROM export_details"
df = pd.read_sql(query, engine)

# ---- STEP 4: Encode categorical variables ----
df['Source'] = df['Source'].astype('category').cat.codes
df['Destination'] = df['Destination'].astype('category').cat.codes

# ---- STEP 5: Prepare features and labels ----
X = df[['Product_Quantity', 'Source', 'Destination']]
y = df['Export_Success']

# ---- STEP 6: Train Naive Bayes model ----
model = GaussianNB()
model.fit(X, y)

# ---- STEP 7: Prepare input for prediction ----
input_df = pd.DataFrame({
    'Product_Quantity': [product_quantity],
    'Source': pd.Series([source]).astype('category').cat.codes,
    'Destination': pd.Series([destination]).astype('category').cat.codes
})

# ---- STEP 8: Predict ----
prediction = model.predict(input_df)
result = "Successful Export" if prediction[0] == 1 else "Unsuccessful Export"
print(result)

# ---- STEP 9: Visualize (Optional) ----
plt.bar(['Product_Quantity', 'Source', 'Destination'], model.theta_[1], color='skyblue')
plt.title("Feature Influence (Naive Bayes Export Prediction)")
plt.ylabel("Mean Influence on Success")
plt.savefig("naive_bayes_export_feature_influence.png")
plt.show()

conn.close()
