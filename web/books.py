#!/usr/bin/env python
import pickle 
#import models.train_popular as train_popular
import json
import os

#df2 = pickle.loads(train_popular.pickledModel)
#idlist = pickle.loads(train_popular.pickledList)

def BookRecommender(book_name):
    #book_list_name = []
    #book_id = df2[df2['title'] == book_name].index
    #book_id = book_id[0]

    #for newid in idlist[book_id]:
    #    book_list_name.append(str(df2.loc[newid].title))
    
    print(json.dumps(os.getcwd()))
    #print(json.dumps(book_list_name))

if __name__ == '__main__':
   import sys
   BookRecommender(sys.argv[1])