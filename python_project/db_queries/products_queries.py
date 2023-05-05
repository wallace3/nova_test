#get all products
select_all_qry='SELECT * FROM products'

#insert one product
insert_one_qry='INSERT INTO products (name, barcode, category, price, status) VALUES (%s,%s,%s,%s,%s)'

#update Product
update_product='UPDATE products SET name=%s, barcode=%s, category=%s, price=%s WHERE id=%s'

#delete product
delete_product='DELETE FROM products WHERE id=%s'

#show by id product
search_by_id='SELECT * FROM products WHERE id=%s'