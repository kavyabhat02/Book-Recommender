#!/usr/bin/env python
import pandas as pd
import pickle
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

#df.replace([np.inf, -np.inf], np.nan, inplace=True)
#df.fillna(999, inplace=True)

rating_df = pd.get_dummies(df2['rating_between'])

features = pd.concat([rating_df, 
                      df2['average_rating'], 
                      df2['ratings_count']], axis=1)

from sklearn.preprocessing import MinMaxScaler
min_max_scaler = MinMaxScaler()
features = min_max_scaler.fit_transform(features)

model = neighbors.NearestNeighbors(n_neighbors=10, algorithm='ball_tree')
model.fit(features)
dist, idlist = model.kneighbors(features)

pickledModel = pickle.dumps(df2)
pickledList = pickle.dumps(idlist)

