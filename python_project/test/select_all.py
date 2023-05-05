import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')

cursor=connection.cursor()

#query
sql='SELECT * FROM products'

#execute query
cursor.execute(sql)

#fetch results
results=cursor.fetchall()

for data in results:
    print(data)

cursor.close()
connection.close()