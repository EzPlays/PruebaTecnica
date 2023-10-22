# Prueba Tecnica

## Ejercicio_1

Para ejecutar el script ubicado en la carpeta "Ejercicio_1", sigue estos pasos:

Abre la terminal y navega a la ubicación de la carpeta usando el comando cd, por ejemplo:

```sh
cd /ruta/Ejercicio_1
```

Luego, ejecuta el script con el siguiente comando:

**En Windows:**

```sh
python inicial.py
```

**En Linux y macOS:**

```sh
python3 inicial.py
```

## Ejercicio_2

### PHP

Para poner en funcionamiento el Ejercicio_2, necesitas un servidor web. En mi caso, he utilizado XAMPP. Asegúrate de subir la carpeta "php" a un servidor web. Dirígete a esta carpeta a través de la línea de comandos:

```sh
cd /ruta/php
```

Y utiliza el siguiente comando para instalar las dependencias necesarias:

```sh
composer install
```

Este comando permite cargar las bibliotecas requeridas para el correcto funcionamiento del Ejercicio_2.

### Python-Django

**Requisitos necesarios para ejecutar el proyecto.**

Para ejecutar este proyecto, es necesario seguir estos pasos:

1. Instalar una versión compatible de Python para [Django](https://docs.djangoproject.com/en/4.2/faq/install/#faq-python-version-support). Recomiendo python 3.10.5

2. Navega a la carpeta "python" desde la terminal.

3. Crea un entorno virtual con el siguiente comando:

    En Windows:

    **En Windows:**

    ```sh
    python -m venv venv
    ```

    **En Linux y macOS:**

    ```sh
    python3 -m venv venv
    ```

4. Activa el entorno virtual con el comando correspondiente:

    **En Windows:**

    ```sh
    venv\Scripts\activate
    ```

    **En Linux y macOS:**

    ```sh
    source venv/bin/activate
    ```

5. Una vez que el entorno virtual esté activado, instala las dependencias necesarias con el siguiente comando:

    ```sh
    pip install -r requirements.txt
    ```

    > Si encuentras algún error relacionado con la biblioteca "mysqlclient" en Windows, instala [MariaDB C Connector](https://mariadb.com/downloads/connectors/). Para obtener más información, consulta la [pagina oficial de la libreria](https://pypi.org/project/mysqlclient/)

6. Para ejecutar el proyecto, navega a la carpeta:

    ```sh
    cd /ruta/python/programa1
    ```

7. Finalmente, ejecuta el programa con el siguiente comando:

    **En Windows:**

    ```sh
    python manage.py runserver
    ```

    **En Linux y macOS:**

    ```sh
    python3 manage.py runserver
    ```

## Proyecto_1-TeleContrato

## Proyecto_2-ShopVue

Para este proyecto utilice Vue.js, ya que es el framework en el que tengo experiencia. Vue.js ofrece numerosas ventajas, entre las que destacan su facilidad de uso, su enfoque en la creación de interfaces de usuario interactivas y su comunidad activa de desarrolladores.

Para comenzar con el proyecto, dirígete a la siguiente ruta:

```sh
cd /ruta/Proyecto_2/ShopVue
```

Antes de ejecutar el proyecto, asegúrate de instalar las dependencias necesarias utilizando el siguiente comando:

```sh
npm install
```

Una vez que las dependencias estén instaladas, inicia el proyecto con el siguiente comando:

```sh
npm run dev
```
