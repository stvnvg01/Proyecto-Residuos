# Proyecto-Residuos

¡Bienvenido a **Proyecto-Residuos**! 🌱

Es una aplicación web construida con Laravel que permite gestionar y registrar recolecciones de residuos, incentivando a los usuarios con un sistema de bonos por cada recolección realizada.

---

## 📋 Descripción

* Formulario web responsive para registro de recolecciones.
* Cálculo y asignación automática de bonos según cantidad y tipo de residuo.
* Panel de administración para revisión y seguimiento de solicitudes.

---

## ✨ Características principales

* Registro y autenticación de usuarios (login / register).
* Validación de datos en formularios con mensajes de error claros.
* Migraciones y seeders para estructura de base de datos.
* Sistema de roles (usuario / administrador).
* Panel de administración con listado de recolecciones.
* Diseño limpio y flexible usando Blade + TailwindCSS (o Bootstrap).

---

## 🚀 Prerrequisitos

* PHP >= 8.0
* Composer
* Node.js & npm (o Yarn)
* Servidor MySQL o MariaDB
* Git

---

## 🔧 Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/stvnvg01/Proyecto-Residuos.git
   cd Proyecto-Residuos
   ```
2. Instala dependencias de PHP:

   ```bash
   composer install
   ```
3. Copia y configura el archivo de entorno:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Ajusta en `.env` los datos de conexión a la base de datos:

   ```env
   DB_DATABASE=nombre_base
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```
5. Instala assets de frontend:

   ```bash
   npm install
   npm run dev
   ```
6. Ejecuta migraciones:

   ```bash
   php artisan migrate --seed
   ```
7. Inicia el servidor local:

   ```bash
   php artisan serve
   ```

La aplicación quedará disponible en `http://localhost:8000`.

---

## 💼 Uso

* Regístrate o inicia sesión.
* Completa el formulario de recolección indicando tipo y cantidad de residuo.
* Consulta tu historial de bonos en el perfil.
* Como administrador, revisa y aprueba las solicitudes desde el panel de administrador.

---

## 🗂️ Estructura del proyecto

```
app/           # Lógica de negocio y modelos
bootstrap/     # Archivos de arranque de Laravel
config/        # Configuraciones
database/      # Migraciones y seeders
public/        # Entrada pública (index.php, assets)
resources/     # Vistas Blade, archivos de estilo y scripts
routes/        # Definición de rutas
storage/       # Logs, caché y archivos generados
tests/         # Pruebas unitarias y de integración
vendor/        # Dependencias instaladas por Composer
```

---

## 🧪 Tests

Ejecuta todas las pruebas con:

```bash
php artisan test
```

---

## 🤝 Contribuciones

1. Haz un fork del repositorio.
2. Crea una rama con tu feature: `git checkout -b feature/nombre`
3. Realiza tus cambios y commitea: `git commit -m "Descripción del cambio"`
4. Haz push a tu rama: `git push origin feature/nombre`
5. Abre un Pull Request en GitHub.

---

## 📄 Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).

---

> Creado por **stvnvg01** · ¡Gracias por contribuir y mejorar la gestión de residuos!

