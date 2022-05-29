#!/usr/bin/env python
import pickle 
import train_popular
import json

df2 = pickle.loads(train_popular.pickledDF)
idlist1 = pickle.loads(train_popular.pickledList1)
idlist2 = pickle.loads(train_popular.pickledList2)
idlist3 = pickle.loads(train_popular.pickledList3)

def BookRecommender(book_name, algo_option):
    book_list_name = []
    book_id = df2[df2['title'] == book_name].index
    book_id = book_id[0]

    idlist = []
    if(algo_option == "brute_force"):
        idlist = idlist1
    elif(algo_option == "ball_tree"):
        idlist = idlist2    
    else:
        idlist = idlist3
        
    for newid in idlist[book_id]:
        book_list_name.append(str(df2.loc[newid].title))
    print(json.dumps(book_list_name))

if __name__ == '__main__':
   import sys
   BookRecommender(sys.argv[1], sys.argv[2])