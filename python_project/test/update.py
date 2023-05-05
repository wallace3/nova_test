import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')

cursor=connection.cursor()

#query
sql='UPDATE products SET name=%s, barcode=%s, category=%s, price=%s WHERE id=%s'


idProducto=input('set id of the product to update: ')
name=input('Type new name: ')
barcode=input('Type new barcode: ')
category=input('Type new category: ')
price=input('Type new price: ')

#collect data from user
data=(name,barcode,category,price,idProducto)

#execute query
cursor.execute(sql,data)

#save data to database
connection.commit()

#count rows affected
rows=cursor.rowcount

#set message
print(f'affected rows {rows}')

cursor.close()
connection.close()



