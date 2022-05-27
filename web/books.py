#!/usr/bin/env python
#import pickle 
#import models.train_popular as train_popular
import json

#df2 = pickle.loads(train_popular.pickledModel)
#idlist = pickle.loads(train_popular.pickledList)

def BookRecommender(book_name):
    book_list_name = ['Gilead', 'The Antiquary']
    print(json.dumps(book_list_name))

if __name__ == '__main__':
   import sys
   BookRecommender(sys.argv[1])