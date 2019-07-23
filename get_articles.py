#!/usr/local/bin/python3
import requests                # Include HTTP Requests module
from bs4 import BeautifulSoup  # Include BS web scraping module
# https://medium.com/doteveryone/doteveryone-is-looking-for-a-finance-and-operations-director-4931facc341c
import mysql.connector

db = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  passwd="password",
  database="doteveryone",
  charset="utf8mb4"
)


mycursor = db.cursor(buffered=True)
postcursor = db.cursor()

mycursor.execute('select post_ID,meta_value from de_postmeta where meta_key = "cyberseo_post_link" and post_id in (select ID from de_posts where post_content = "" and post_type = "post")')

myresult = mycursor.fetchall()

for x in myresult:
  print("https://www.doteveryone.org.uk/index.php?p="+str(x[0]))
  url = x[1]
  r = requests.get(url)           # Sends HTTP GET Request
  soup = BeautifulSoup(r.text, "html.parser") # Parses HTTP Response
  # print(soup.prettify())          # Prints user-friendly results
  article = ""
  sections = soup.select("div.af.ac.dj.w.x")
  author = sections[0].select_one('div.ag span a').text
  # print(author)
  sections[0].select_one('div').decompose()
  for section in sections:
    # article.select_one(".hr.hs.dx.aq.ht.b.hu.hv.hw.hx.hy.hz.ia").decompose()
    # for tag in section:
    #     for attribute in ["class","id"]: # You can also add id,style,etc in the list
    #         del tag[attribute]
    article += str(section)
  sql = "UPDATE de_posts set post_content = %s where ID = %s"
  val = (article.replace('max/60', 'max/700').strip('\n'),str(x[0]))
  postcursor.execute(sql,val)
  sql = "INSERT INTO de_postmeta (post_id,meta_value,meta_key) VALUES (%s,%s,'author')"
  val = (str(x[0]),author)
  postcursor.execute(sql,val)
  db.commit()