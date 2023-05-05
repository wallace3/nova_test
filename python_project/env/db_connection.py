import psycopg2

#db connection
connection=psycopg2.connect(user='postgres',
                            password='root',
                            host='127.0.0.1',
                            port='5433',
                            database='nova_test')