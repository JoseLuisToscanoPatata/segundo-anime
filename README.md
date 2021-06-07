<p align="center"><img src="https://raw.githubusercontent.com/JoseLuisToscanoPatata/segundo-anime/master/.github/images/mrsaturn3.svg" width="250" height="250"></p>

<p align="center" style="font-size: 40px; color: purple; font-weight: 900;">BIG CHUNGUS</p>

## Sobre Big Chungus

<p align="justify">Tal como se explica en nuestra app, Big Chungus es una página web basada en [MyAnimeList] (https://myanimelist.net), la cual toma las principales y más básicas funcionalidades de esta, como pueden ser:</p>

- <p align="justify">Buscar animes y mangas de entre una gran lista disponible.</p>
- <p align="justify">Obtener información de dichos elementos, como puede ser trailers, nombres, fechas de lanzamiento, nota media, etc..</p>
- <p align="justify">Añadir mangas y animes a tus propias listas, pudiendo puntuarlas, añadirlos a favoritos y indicar el estado de la vista.</p>
- <p align="justify">Posibilidad de tener amigos, enviar mensajes, y comparar tu lista con las de otros usuarios.</p>

<p align="justify"> A estas funciones se le incluirán otras nuevas, como pueden ser nueva información sobre los elementos, grupos, análisis, etc. Esto siempre que acabe teniendo ganas de hacerlo :/</p>

## Plataforma

Esta aplicación ha sido desarrollada mediante PHP y javascript, utilizando el framework de [Laravel](https://laravel.com) en conjunto con el starter kit de [Jetstream](https://jetstream.laravel.com), el cual nos proporciona multitud de funcionalidades de las que posee nuestra aplicación, como pueden ser:

- <p align="justify">Proceso completo de Registro y Login de usuarios.</p>
- <p align="justify">Envío de correos electrónicos a los usuarios, tanto para confirmación inicial como para restablecer contraseña.</p>
- <p align="justify">Creación de tokens de autenticación de usuarios, tanto autenticación de usuarios a nuestra API rest como a las vistas de nuestra app.</p>
- <p align="justify">Borrado de sesiones de usuario en los distintos equipos/navegadores.</p>
- Restablecimiento de contraseña.
- Autenticación en dos pasos mediante código QR.

<p align="justify">Por otro lado, estos frameworks nos proporcionan un fácil sistema de enrutamiento de API y de web, creación de vistas mediante plantillas y componentes [Vue](https://v3.vuejs.org), middlewares, controladores de acceso a nuestra API rest y modelos de acceso a la base de datos, entre otras muchas cosas.</p>

## Requisitos

En el caso de que quieras instalar la aplicación en tu equipo (aunque en un principio está pensado utilizar un host gratuito) será necesario disponer de los siguientes componentes en tu equipo:

- <p align="justify">[Git](https://git-scm.com), así como una cuenta de [GitHub](https://github.com).</p>
- PHP 8+ (preferiblemente [XAMPP](https://www.apachefriends.org/es/index.html)).
- [Composer](https://getcomposer.org)
- [NPM](https://getcomposer.org)

<p align="justify">También es recomendable tener un editor de texto orientado a programación, como puede ser [Visual Stucio Code](https://code.visualstudio.com), aunque no es estrictamente necesario, pues se pueden ejecutar los comandos desde una consola de comandos.</p>

## Instalación

Una vez instalado todo lo necesario, habrá que seguir los siguientes pasos:

- <p align="justify">Clonar el repositorio actual en un directorio a elegir, en el caso de utilizar XAMPP tendrá que hacerse dentro de una carpeta en el directorio htdocs (en windows) en la carpeta de XAMPP.</p>

<p align="center">git clone https://github.com/JoseLuisToscanoPatata/segundo-anime.git</p>

- <p align="justify">Copiar el fichero .env.example, y renombrar la copia a ".env" a secas, dentro de este fichero habrá que establecer la variable APP_URL a "http://localhost:8000", en el caso de querer habiltiar los correos electrónicos, habrá que poner lo siguiente en las siguientes líneas:</p>

<p align="center"><img src="https://raw.githubusercontent.com/JoseLuisToscanoPatata/segundo-anime/master/.github/images/mail_data.JPG" width="350" height="200"></p>

- <p align="justify">Por otro lado, habrá que configurar en ese mismo fichero las siguientes líneas, que serán las que permitirán el almacenamiento de imágenes en el servidor de amazon aws:</p>

    AWS_ACCESS_KEY_ID=Preguntar por correo
    AWS_SECRET_ACCESS_KEY=Preguntar por correo
    AWS_DEFAULT_REGION=us-east-2
    AWS_BUCKET=proyectobigchungus

<p align="justify">Una vez realizado esto, habrá que que poner los siguientes comandos en orden en el directorio inicial del proyecto:</p>

- Composer install
- npm install
- php artisan key:generate
- php artisan config:cache
- npm run dev

Una vez hecho esto, tendremos que descargar los datos a la base de datos poniendo lo siguiente:

- php artisan migrate:fresh (Para crear la base de datos)
- <p align="justify">php artisan db:seed (Para rellenar las tablas, esto tardará 1-2 horas, pues los datos se obtienen de una API externa, y hay tablas con cientos de miles de datos).</p>

Finalmente, para iniciar la aplicación, tendremos que poner lo siguiente:

- php artisan serve.
- npm run watch.

<p align="justify">Y listo, con esto podremos entrar a nuestra página web poniendo la URL localhost:8000 en nuestro navegador.</p>
