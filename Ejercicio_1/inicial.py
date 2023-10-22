def print_first_n_lines(file, n):
    try:
        with open(file, 'r', encoding='utf-8') as f: # la función open abre el archivo en modo lectura
            lines = f.readlines()
            for i in range(n):
                if i < len(lines): # verifica que solo se muestren el n numero de lineas
                    print(lines[i].strip())
                else:
                    break
    except FileNotFoundError as error:
        # captura el error en caso de que el archivo no exista
        print(f"Lo siento, el archivo no existe. (o no ejecuto el código desde la carpeta Ejercicio_1)")
        print(error)
    except Exception as e:
        print(f"Ocurrió un error: {e}")

print_first_n_lines('frutas.txt', 5) 