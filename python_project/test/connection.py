import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')

cursor=connection.cursor()

sql='SELECT * FROM products'

cursor.execute(sql)

data=cursor.fetchall()
print(data)

cursor.close()
connection.close()