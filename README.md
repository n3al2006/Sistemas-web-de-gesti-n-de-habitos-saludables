# Instalación del proyecto en sus maquina local.
- Clonar el proyecto en la maquina local.
´´´bash
git clone https://github.com/n3al2006/Sistemas-web-de-gesti-n-de-habitos-saludables.git

´´´
# Despues de clonar el repositioro:
- **Requisitos:**
- Instalen composer, busquen en google, composer descargar, ahi lo van a encontrar.


- Ojo, deben de clonarlo en esta direccion:
´´´bash
C:\xampp\htdocs

´´´
- Abren la carpeta que clonaron en **Visual Studio** y buscan el archivo **.env**
- Dentro del contenido deben buscar este contenido, que este igual a este:

´´´bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=habithub
DB_USERNAME=root
DB_PASSWORD=

´´´
- No se olviden activar **XAMPP**

- En visual studio abren un nueva terminal y ejecutan este comando:
´´´bash
php artisan migrate

´´´
- Despues para vizualizar el contenido en la web:

´´´bash
php artisan serve

´´´

- Saldra algo como este:

´´´bash
Server running on [http://127.0.0.1:8000].  

´´´
- **Eso es Todo, si tienen dudas al respecto preguntar en nuestro grupo**