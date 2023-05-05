from . import products_core as core

def execute_option(option):
    if option == "1":
        insert=core.create_product()
        print(insert)
    if option == "2":
        showall=core.show_product()
        print(*showall, sep = "\n")
    if option == "3":
        update=core.update_product()
        print(update)
    if option == "4":
        delete=core.delete_product()
        print(delete)
    if option == "5":
        search_by_id=core.search_product()
        print(search_by_id)
    if option == "e":
        core.terminate_connection()
    