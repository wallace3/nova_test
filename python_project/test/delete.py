import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')

cursor=connection.cursor()

#query
sql='DELETE FROM products WHERE id=%s'

#ask user for product
idProduct=input('Type id of the product to delete: ')

#execute query
cursor.execute(sql,idProduct)

#commit query
connection.commit()

#count rows affected
rows=cursor.rowcount

#set message
print(f'affected rows {rows}')