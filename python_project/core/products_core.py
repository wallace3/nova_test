from env import db_connection as psql
from db_queries import products_queries as qrys

def create_product():
    cursor=psql.connection.cursor()
    name=input('Ingrese nombre de producto: ')
    barcode=input('Ingrese barcode:')
    category=input('Ingrese categoria: ')
    price=input('Ingrese Precio: ')
    status=input('Ingrese Status: ')
    sql=qrys.insert_one_qry
    data=(name,barcode,category,price,status)
    cursor.execute(sql,data)
    psql.connection.commit()
    info=cursor.rowcount
    cursor.close()
    return info

def update_product():
    cursor=psql.connection.cursor()
    #ask user for information to update
    idProducto=input('set id of the product to update: ')
    name=input('Type new name: ')
    barcode=input('Type new barcode: ')
    category=input('Type new category: ')
    price=input('Type new price: ')
    sql=qrys.update_product
    #collect data from user
    data=(name,barcode,category,price,idProducto)
    #execute query
    cursor.execute(sql,data)
    #do transaction
    psql.connection.commit()
    #check affected rows
    info=cursor.rowcount
    cursor.close()
    return info

def delete_product():
    cursor=psql.connection.cursor()
    #ask user for id of the product to delete
    idProduct=input('Type id of the product to delete: ')
    #assign qry from queries
    sql=qrys.delete_product
    #execute query
    cursor.execute(sql,idProduct)
    #do transaction
    psql.connection.commit()
    #show affected rows
    info=cursor.rowcount
    cursor.close()
    return info

def show_product():
    cursor=psql.connection.cursor()
    sql=qrys.select_all_qry
    cursor.execute(sql)
    results=cursor.fetchall()
    cursor.close()
    return results

def search_product():
    cursor=psql.connection.cursor()
    #ask user for id of the product to search
    idProduct=input('Type id of the product to search: ')
    #assign qry from queries
    sql=qrys.search_by_id
    #execute query
    cursor.execute(sql,idProduct)
    #get info
    result=cursor.fetchall()
    cursor.close()
    return result

def terminate_connection():
    psql.connection.close()