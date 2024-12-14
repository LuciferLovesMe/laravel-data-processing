#!/usr/bin/env python
# coding: utf-8

# In[3]:


import pandas as pd
import sys
import json

def processing() :
    file_path = sys.argv[1]
    # file_path = "C:/Users/Tole/Downloads/data_csv/Data Kunjungan Berdasarkan Data Tempat Wisata.csv"
    data = pd.read_csv(file_path)

    # Display the first few rows of the dataset
    data.head()


    # Remove rows with unnecessary headers or NaN values in key columns
    cleaned_data = data.dropna(subset=["TAHUN", "DATA TEMPAT WISATA"]).reset_index(drop=True)

    # Convert relevant columns to proper data types if needed (e.g., integers after removing commas)
    cleaned_data["TAHUN"] = cleaned_data["TAHUN"].astype(int)
    cleaned_data["JUMLAH"] = cleaned_data["JUMLAH"].str.replace(',', '').astype(int)

    # Initialize the total dictionary
    total = {}

    # Loop through the data to calculate total visitors per year (index 1 -> "TAHUN", index 6 -> "JUMLAH")
    for _, row in cleaned_data.iterrows():
        year = row["TAHUN"]  # index 1 equivalent
        jumlah = row["JUMLAH"]  # index 6 equivalent
        
        # Add to total dictionary
        if year not in total:
            total[year] = jumlah  # Initialize if year not in dictionary
        else:
            total[year] += jumlah  # Add to existing total

    # Display the cleaned data's first few rows
    # print(cleaned_data.head())
    # Display the result
    return json.dumps(total)

print(processing())
# Load the uploaded CSV file to examine its content


# In[ ]:




