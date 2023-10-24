# Prueba Tecnica

## Ejercicio_1

Para ejecutar el script ubicado en la carpeta "Ejercicio_1", sigue estos pasos:

Abre la terminal y navega a la ubicación de la carpeta usando el comando cd, por ejemplo:

```sh
cd /Ejercicio_1
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
cd /php
```

Y utiliza el siguiente comando para instalar las dependencias necesarias:

```sh
composer install
```

Este comando permite cargar las bibliotecas requeridas para el correcto funcionamiento del Ejercicio_2.

Asegúrese de que la base de datos "datosdb" esté creada y configure los siguientes parámetros en el archivo programa1.php:

```php
$host = "localhost"; // tu host
$port = "5432"; // tu puerto
$dbname = "datosdb"; 
$user = "postgres"; // tu usuario
$password = "root"; // tu contraseña
```

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
    cd /python/programa1
    ```

7. Por favor, revisa el archivo settings.py y asegúrate de verificar la sección llamada DATABASES.

    ```py
    DATABASES = {
        'default': {
            'ENGINE': 'django.db.backends.mysql',
            'NAME': 'datosdb', # nombre de la base de datos
            'USER': 'root', # usuario de la base de datos
            'PASSWORD': 'root', # contraseña de la base de datos
            'HOST': 'localhost', # host
            'PORT': '3306', # puerto
        }
    }
    ```

8. Finalmente, ejecuta el programa con el siguiente comando:

    **En Windows:**

    ```sh
    python manage.py runserver
    ```

    **En Linux y macOS:**

    ```sh
    python3 manage.py runserver
    ```

## Proyecto_1-TeleContrato

Para iniciar el proyecto, sigue estos pasos:

1. Navega hasta la ubicación del proyecto:

    ```sh
    cd Proyecto_1/TeleContrato
    ```

2. Instala las dependencias necesarias para ejecutar el proyecto:

    ```sh
    composer install
    ```

    ```sh
    npm install
    ```

3. Verifica el archivo .env para configurar la conexión a la base de datos. Asegúrate de que las siguientes configuraciones sean correctas:

    ```python
    DB_CONNECTION=pgsql
    DB_HOST=localhost # Host
    DB_PORT=5432     # Puerto
    DB_DATABASE=telecontrato # Nombre de la base de datos
    DB_USERNAME=postgres   # Usuario
    DB_PASSWORD=root      # Contraseña
    ```

4. Inicia las migraciones de la base de datos con el siguiente comando:

    ```sh
    php artisan migrate
    ```

5. Abre dos terminales en la misma ubicación del proyecto:

    ```sh
    cd Proyecto_1/TeleContrato
    ```

    * En la primera terminal, inicia el servidor local:

        ```sh
        php artisan serve
        ```

    * En la segunda terminal, compila los archivos estáticos:

        ```sh
        npm run dev
        ```

Utiliza el servidor local generado por php artisan serve para ver el proyecto. El otro comando (npm run dev) se utiliza para compilar los archivos estáticos.

> Durante el desarrollo de este proyecto, me enfrenté a varios desafíos debido a mi falta de experiencia en el framework. Aunque algunas áreas me resultaron familiares, estoy comprometido a seguir aprendiendo y mejorando mis habilidades en el uso de Laravel. Aprender el funcionamiento de Laravel ha sido una experiencia gratificante, y estoy decidido a continuar ampliando mis conocimientos en este framework para llevar mi proyecto a un nivel aún más alto.

## Proyecto_2-ShopVue

Para este proyecto utilice Vue.js, ya que es el framework en el que tengo experiencia. Vue.js ofrece numerosas ventajas, entre las que destacan su facilidad de uso, su enfoque en la creación de interfaces de usuario interactivas y su comunidad activa de desarrolladores.

Para comenzar con el proyecto, dirígete a la siguiente ruta:

```sh
cd /Proyecto_2/ShopVue
```

Antes de ejecutar el proyecto, asegúrate de instalar las dependencias necesarias utilizando el siguiente comando:

```sh
npm install
```

Una vez que las dependencias estén instaladas, inicia el proyecto con el siguiente comando:

```sh
npm run dev
```
