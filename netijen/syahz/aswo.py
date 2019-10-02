
import requests
from bs4 import BeautifulSoup
import pymysql


mydb = pymysql.connect("localhost","userbasis","1234","aswo" )
mycursor = mydb.cursor()

# get the data
data = requests.get('https://umggaming.com/leaderboards')

# load data into bs4
soup = BeautifulSoup(data.text, 'html.parser')

leaderboard = soup.find('table', { 'id': 'leaderboard-table' })
tbody = leaderboard.find('tbody')

for tr in tbody.find_all('tr'):
    place = tr.find_all('td')[0].text.strip()
    username = tr.find_all('td')[1].find_all('a')[1].text.strip()
    xp = tr.find_all('td')[3].text.strip()
    print(place, username, xp)

    Val6 = [xp,place]
    Val7 = [Val6]
    for xp, place in Val7:
            mycursor.execute('''insert into xptb (xp, place)
                values (%s, %s)''',
                (xp, place))

    Val4 = [username,place]
    Val5 = [Val4]
    for username, place in Val5:
            mycursor.execute('''insert into usertb (username, place)
                values (%s, %s)''',
                (username, place))

    Val2 = [place,username, xp]
    Val3 = [Val2]
    for place, username, xp in Val3:
            mycursor.execute('''insert into maintable (place, username, xp)
                values (%s, %s, %s)''',
                (place, username, xp))

mydb.commit()
print('sukses')