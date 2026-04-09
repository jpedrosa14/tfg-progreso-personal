# 📊 Personal Progress Tracker

Aplicación web desarrollada como Trabajo de Fin de Grado (TFG) en Ingeniería Informática.

Permite a los usuarios gestionar su progreso personal mediante el seguimiento de hábitos, actividad física y lecturas, incluyendo visualización de datos a través de un dashboard interactivo.

---

## 🚀 Funcionalidades principales

- Autenticación de usuarios (registro, login, logout)
- Gestión de hábitos (crear, editar, eliminar, completar)
- Registro de actividad física
- Gestión de lecturas (pendiente, leyendo, leído)
- Dashboard con métricas y gráficas

---

## 🛠️ Tecnologías utilizadas

- Backend: Laravel (PHP)
- Frontend: Blade + TailwindCSS + Bootstrap
- Base de datos: MySQL
- Gráficas: Chart.js
- Servidor local: XAMPP / Laravel Serve

---

## ⚙️ Requisitos

- PHP >= 8.x
- Composer
- Node.js + npm
- MySQL
- XAMPP o similar

---

## 📦 Instalación del proyecto

### 1. Clonar o copiar el proyecto

Si tienes repositorio:

git clone https://github.com/jpedrosa14/tfg-progreso-personal.git
cd progreso-personal  

Si no:

Descomprimir el proyecto en una carpeta local

---

### 2. Instalar dependencias

composer install  
npm install  

---

### 3. Configurar entorno

cp .env.example .env  
php artisan key:generate  

---

### 4. Configurar base de datos

Editar el archivo `.env` con los datos de la base de datos:

DB_DATABASE=progreso_personal  
DB_USERNAME=root  
DB_PASSWORD=  

---

### 5. Ejecutar migraciones

php artisan migrate  

---

### 6. Ejecutar la aplicación

En una terminal:

php artisan serve  

En otra terminal:

npm run dev  

---

### 7. Acceder a la aplicación

Abrir en el navegador:

http://127.0.0.1:8000  

---

## 👤 Uso de la aplicación

1. Registrarse como nuevo usuario  
2. Crear hábitos  
3. Marcar hábitos como completados diariamente  
4. Registrar actividad física  
5. Añadir lecturas y su estado  
6. Consultar el dashboard para ver el progreso  

---

## 📊 Estructura del proyecto

- app/Models → Modelos de datos  
- app/Http/Controllers → Controladores  
- resources/views → Vistas (Blade)  
- routes/web.php → Rutas  
- database/migrations → Estructura de la base de datos  

---

## 🔒 Seguridad

- Acceso restringido mediante autenticación  
- Los datos están asociados al usuario autenticado  
- Protección CSRF en formularios  

---

## 📌 Notas

- La aplicación está diseñada para ejecutarse en entorno local  
- Todas las dependencias utilizadas son gratuitas y de libre distribución  

---

## 👨‍💻 Autor

Jesús Pedrosa Garrido
Grado en Ingeniería Informática - TFG
