import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')

cursor=connection.cursor()

#query
sql='INSERT INTO products (name, barcode, category, price, status) VALUES (%s,%s,%s,%s,%s)'

#get info from user inputs
name=input('Ingrese nombre de producto: ')
barcode=input('Ingrese barcode:')
category=input('Ingrese categoria: ')
price=input('Ingrese Precio: ')
status=input('Ingrese Status: ')

#collect data
data=(name,barcode,category,price,status)

#execute query
cursor.execute(sql,data)

#save data 
connection.commit()

#data inserted
info=cursor.rowcount

#set message
print(f'registro insertado {info}')

cursor.close()
connection.close()