from bs4 import BeautifulSoup
import requests
import pymysql
import re

mydb = pymysql.connect("localhost","userbasis","1234","dbfilm" )
mycursor = mydb.cursor()

req = requests.get('https://dunia21.wtf/quality/bluray/page/2').text

soup = BeautifulSoup(req, 'lxml')
for article in soup.find_all('article'):
    name_container = article.find('h1', class_='grid-title').a.text.replace('Nonton','').replace('Film Subtitle Indonesia Streaming Movie Download','').replace('’','').replace('(','').replace(')','')
    print(name_container)
    kategori_container = article.find('div', class_='grid-categories').text
    
    kategorinya = kategori_container;
    print(kategori_container)
    inilink = article.find('h1', class_='grid-title').a
    link_container = re.search(r'"https://dunia21.wtf/(.*)/"',str(inilink)).group(0).replace('"','')
    print(link_container)

    Val4 = [kategori_container, name_container]
    Val5 = [Val4]
    for  kategori_container, name_container in Val5:
           mycursor.execute('''insert into tbl_kategori (film_kategori, judul_film)
                      values (%s, %s)''',
                     (kategori_container, name_container))


    Val6 = [link_container, name_container]
    Val7 = [Val6]
    for  link_container, name_container in Val7:
           mycursor.execute('''insert into tbl_link (film_link, film_judul)
                      values (%s, %s)''',
                     (link_container, name_container))

    Val2 = [name_container,kategori_container, link_container]
    Val3 = [Val2]
    for name_container, kategori_container, link_container in Val3:
           mycursor.execute('''insert into film (film_nama, film_kategori, film_link)
                      values (%s, %s, %s)''',
                     (name_container, kategori_container, link_container))

    #mycursor.execute(sql)


mydb.commit()
print('sukses')