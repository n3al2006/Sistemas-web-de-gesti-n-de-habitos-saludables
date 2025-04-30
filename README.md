# Instalación del proyecto en tu máquina local

## 1. Clonar o extraer el proyecto

Abre tu terminal y ejecuta:

```bash
git clone https://github.com/n3al2006/Sistemas-web-de-gesti-n-de-habitos-saludables.git
```

> **Importante:** Debes clonar el proyecto en la siguiente ruta:

```bash
C:\xampp\htdocs
```

---

## 2. Requisitos

- Tener instalado **Composer**.
  - Puedes buscar en Google: `composer descargar` y seguir las instrucciones desde el sitio oficial.

---

## 3. Configurar el archivo `.env`

- Abre la carpeta del proyecto clonado en **Visual Studio Code**.
- Busca y abre el archivo **`.env`**.
- Verifica que el contenido relacionado a la base de datos sea el siguiente:

```env
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=habithub  
DB_USERNAME=root  
DB_PASSWORD=
```

---

## 4. Iniciar XAMPP

- Asegúrate de tener **XAMPP** activado (MySQL y Apache encendidos).

---

## 5. Ejecutar migraciones

- En Visual Studio Code, abre una nueva terminal y ejecuta:

```bash
php artisan migrate
```

---

## 6. Levantar el servidor

- Luego ejecuta:

```bash
php artisan serve
```

Deberías ver algo como esto:

```bash
Server running on [http://127.0.0.1:8000]
```

---

## ✅ ¡Listo!

Si tienen dudas al respecto, no duden en preguntar en nuestro grupo.
