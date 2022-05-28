#!/usr/bin/env python
import pickle
import numpy as np 
import pandas as pd
from sklearn.cluster import KMeans
from sklearn import neighbors
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import MinMaxScaler

df = pd.read_csv('books.csv',error_bad_lines = False)
df.head()

df.fillna(0,inplace=True)
df.isnull().sum()

df2 = df.copy()
df2.loc[ (df2['average_rating'] >= 0) & (df2['average_rating'] <= 1), 'rating_between'] = "between 0 and 1"
df2.loc[ (df2['average_rating'] > 1) & (df2['average_rating'] <= 2), 'rating_between'] = "between 1 and 2"
df2.loc[ (df2['average_rating'] > 2) & (df2['average_rating'] <= 3), 'rating_between'] = "between 2 and 3"
df2.loc[ (df2['average_rating'] > 3) & (df2['average_rating'] <= 4), 'rating_between'] = "between 3 and 4"
df2.loc[ (df2['average_rating'] > 4) & (df2['average_rating'] <= 5), 'rating_between'] = "between 4 and 5"

rating_df = pd.get_dummies(df2['rating_between'])

features = pd.concat([rating_df, df2['average_rating'], df2['ratings_count']], axis=1)

from sklearn.preprocessing import MinMaxScaler
min_max_scaler = MinMaxScaler()
features = min_max_scaler.fit_transform(features)

model1 = neighbors.NearestNeighbors(n_neighbors=6, algorithm='brute_force')
model1.fit(features)
dist1, idlist1 = model1.kneighbors(features)

model2 = neighbors.NearestNeighbors(n_neighbors=6, algorithm='ball_tree')
model2.fit(features)
dist2, idlist2 = model2.kneighbors(features)

model3 = neighbors.NearestNeighbors(n_neighbors=6, algorithm='kd_tree')
model3.fit(features)
dist3, idlist3 = model3.kneighbors(features)

pickledDF = pickle.dumps(df2)
pickledList1 = pickle.dumps(idlist1)
pickledList2 = pickle.dumps(idlist2)
pickledList3 = pickle.dumps(idlist3)
