# Proyecto de Web II - Carrito de Compras
---
-.- quien haya borrado mi trabajo merece la muerte! (atte. Julieta :) )
---
---
mi pasión es borrar trabajos
---

## Importar el Proyecto
1. Tener instalado xampp y composer en C:/
2. Crear una carpeta para el proyecto
3. Usar el siguiente comando estando en esa carpeta
    * `composer create-project --prefer-dist laravel/laravel tienda_online`
4. Clonar el repositorio de Github a alguna otra carpeta vacía
5. Copiar todas las carpetas dentro del repositorio (incluyendo vite.config.js) a la carpeta del proyecto y aceptar todos los cambios
6. La imagen default.png va dentro de la carpeta public/storage/image, se copia después de usar el [comando](#Comandos) para almacenar imágenes
7. De preferencia usar PhpStorm

---

## Carpetas Principales

* **App** tiene las carpetas de *models* (bases de datos usadas) y *controllers* (importantes para comunicar frontend con backend)
* **Databases** tiene las tablas de la base de datos y migraciones
* **Resources** tiene toda la parte de frontend, principalmente *views* y *components*
* **Routes** tiene toda la lógica de cómo se comunican las páginas entre sí y qué variables se pasan, son como "prototipos"

---

## CSS
Antes que nada hay que instalar NodeJS y npm, con este link pueden guiarse si no lo tienen todavía: [Tutorial NodeJS y npm](https://www.cursosgis.com/como-instalar-node-js-y-npm-en-4-pasos/)

Después solo hay que poner los siguientes comandos (en orden) para instalar *Bootstrap* en el directorio del proyecto

1. `npm install -D bootstrap@5.3.3`
2. `npm install -D sass`
3. `npm install `

### Íconos de Boostrap

Para q no crashee lo de los íconos escribir lo siguiente

    npm install bootstrap-icons

En caso de que el archivo app.scss no se haya modificado por alguna razón la ruta para los íconos es a siguiente

   `@import "../../node_modules/bootstrap-icons/font/bootstrap-icons.css";`
   
---

## .env
El archivo .env es el que tiene toda la configuración del server, hay que copiar ***todo***
el archivo de .env.example al archivo .env para que el server funcione

---

## Comandos
**Siempre se usa al inicio `cd tienda_online` para poder usar los comandos de php**

### Iniciar Server
    php artisan serve

### Compilar CSS (Se hace después de iniciar el server)
    npm run dev

### Migraciones de BDs (Solo se hace la primera vez y en caso de modificar tablas)
    php artisan migrate

### Link para almacenar imágenes (Solo se hace una vez)
    php artisan storage:link

---
