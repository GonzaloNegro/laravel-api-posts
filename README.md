<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Laravel JWT API
Este proyecto es una API RESTful construida con Laravel que permite a los usuarios registrarse, autenticarse y realizar operaciones CRUD sobre publicaciones (posts).  
Las rutas protegidas están aseguradas mediante autenticación JWT.

---
---
## 🛠 Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/GonzaloNegro/laravel-api-posts
   cd laravel-api-posts

2. Instalar dependencias:
    ```bash
    composer install

3. Copiar el archivo .env de ejemplo:
    ```bash
    cp .env.example .env

4. Generar la clave de la aplicación:
    ```bash
    php artisan key:generate

5. Configurar la base de datos en el archivo .env.

6. Ejecutar las migraciones:
    ```bash
    php artisan migrate

7. Instalar el paquete JWT:
    ```bash
   php artisan jwt:secret

9. Levantar el servidor de desarrollo:
    ```bash
    php artisan serve

---

🔐 Autenticación con JWT
La API utiliza JWT (JSON Web Tokens) para autenticar usuarios.
Las rutas protegidas requieren que se incluya el token en el encabezado:
Authorization: Bearer {token}

---

📦 Endpoints
La API permite:

Registro y login de usuarios

Consulta del perfil del usuario autenticado

CRUD completo de posts (solo por su autor)

Logout y renovación de token

📘 Consultá todos los endpoints y ejemplos en la colección Postman:
📄 docs/laravel-jwt-api.postman_collection.json

---

🧬 Relación entre Tablas
La relación entre los modelos es la siguiente:

Un User puede tener muchos Posts

Cada Post pertenece a un único User

---

✅ Funcionalidades implementadas
 Registro y login con JWT

 Middleware de autenticación (auth:api)

 CRUD de publicaciones con validación

 Validación de inputs con reglas Laravel

 Asociación de posts al usuario autenticado

 Autorización para editar/eliminar solo tus posts

 Documentación de la API (Postman)

 Imagen de relaciones entre tablas

 Subida a GitHub (pendiente)

 Documentación con Swagger (opcional)

---

## 🧩 Documentación Adicional

📌 **Colección Postman:**  
Podés importar esta colección en Postman para probar los endpoints rápidamente:  
[`Laravel JWT API Project.postman_collection.json`](docs/Laravel%20JWT%20API%20Project.postman_collection.json)

📌 **Relación entre tablas:**  
Esta imagen muestra cómo se relacionan las tablas del sistema:  
![Relación entre tablas](docs/relacion-tablas.jpeg)

---

 🧪 Tecnologías utilizadas
PHP 8+

Laravel 10

MySQL / PostgreSQL

JWT con tymon/jwt-auth

Postman

---

✍️ Autor
Desarrollado por Gonzalo Negro
📍 Córdoba, Argentina
