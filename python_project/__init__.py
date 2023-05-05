import core.logic as logic

def main():
    while True:
        response=input('''Indicva una opción:
                       1 -> crear nuevo
                       2 -> ver todos
                       3 -> actualizar
                       4 -> elminar
                       5 -> buscar por id5
                       e -> Salir''')
        logic.execute_option(response)
        if response == "e": break

main()