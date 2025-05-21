# Proyecto-Residuos

¡Bienvenido a **Proyecto-Residuos**! 🌱

Una aplicación web construida con Laravel para gestionar y registrar recolecciones de residuos, ofreciendo bonos como incentivo por cada actividad. Este proyecto forma parte de mi portafolio profesional.

---

## 📋 Descripción

* Formulario web responsive para registro de recolecciones.
* Cálculo y asignación automática de bonos según cantidad y tipo de residuo.
* Panel de administración para revisión y seguimiento de solicitudes.
* Ejemplo de base de datos en MySQL exportada desde **phpMyAdmin**.

---

## ✨ Características

* **Autenticación** de usuarios (registro / inicio de sesión).
* **Validación** de formularios con mensajes claros.
* **Migraciones** y **seeders** para estructura de base de datos.
* **Roles**: usuario y administrador.
* Panel de administrador con listado y gestión de recolecciones.
* Vistas con Blade y estilo con TailwindCSS (o Bootstrap).

---

## 🚀 Requisitos previos

* PHP >= 8.0
* Composer
* Node.js & npm (o Yarn)
* Servidor MySQL o MariaDB
* Git

---

## 🔧 Instalación y configuración

1. **Clona el repositorio**

   ```bash
   git clone https://github.com/stvnvg01/Proyecto-Residuos.git
   cd Proyecto-Residuos
   ```
2. **Instala dependencias de PHP**

   ```bash
   composer install
   ```
3. **Configura el entorno**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Ajusta las credenciales** en `.env`:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=proyecto_residuos_local
   DB_USERNAME=root
   DB_PASSWORD=tu_contraseña
   ```
5. **Instala assets de frontend**

   ```bash
   npm install
   npm run dev
   ```
6. **Ejecuta migraciones y seeders** (opcional si usas dump SQL):

   ```bash
   php artisan migrate --seed
   ```
7. **Inicia el servidor**

   ```bash
   php artisan serve
   ```

La aplicación quedará disponible en `http://localhost:8000`.

---

## 🗄️ Base de datos de ejemplo

Para facilitar pruebas rápidas, incluimos un dump de MySQL exportado desde **phpMyAdmin**. Es un ejemplo que puedes importar en tu entorno local o en la nube.

1. **Ubicación**: `database/proyecto_residuos_dump.sql`
2. **Crear base de datos vacía**:

   ```sql
   CREATE DATABASE proyecto_residuos_local CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. **Importar el dump**:

   ```bash
   mysql -u root -p proyecto_residuos_local < database/proyecto_residuos_dump.sql
   ```
4. **Verifica las credenciales** en tu `.env` (punto 4 arriba).

> ⚠️ El archivo SQL **solo** es un ejemplo de datos. No contiene información sensible.

---

## 💼 Uso

1. Regístrate o inicia sesión.
2. Completa el formulario de recolección indicando tipo y cantidad.
3. Revisa tu historial de bonos en el perfil.
4. Como administrador, gestiona solicitudes desde el panel.

---

## 🗂️ Estructura del proyecto

```
app/           # Lógica de negocio y modelos
bootstrap/     # Arranque de Laravel
config/        # Configuraciones
database/      # Migraciones, seeders y dump de ejemplo
public/        # Entrada pública y assets
resources/     # Vistas Blade, CSS y JS
routes/        # Definición de rutas
storage/       # Logs, caché y subidas
tests/         # Pruebas unitarias y de integración
vendor/        # Dependencias Composer
```

---

## 🧪 Pruebas

Ejecuta todas las pruebas con:

```bash
php artisan test
```

---

## 🤝 Contribuciones

1. Haz fork y clona tu rama.
2. Crea un branch: `git checkout -b feature/nombre`.
3. Realiza cambios y commitea: `git commit -m "Descripción"`.
4. Sube tu rama: `git push origin feature/nombre`.
5. Abre un Pull Request.

---

## 📄 Licencia

Licencia MIT. ¡Contribuye y ayuda a mejorar la gestión de residuos!

---

> Creado por **stvnvg01** · Más info en [stvnvg01](https://github.com/stvnvg01)
