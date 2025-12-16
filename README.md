# 🎬 StreamRoll

[![Laravel](https://img.shields.io/badge/Laravel-8.x-red)](https://laravel.com/) [![PHP](https://img.shields.io/badge/PHP-8.3-blue)](https://www.php.net/) [![MySQL](https://img.shields.io/badge/MySQL-8.0-blue)](https://www.mysql.com/)

**StreamRoll** es una plataforma de streaming para la gestión y visualización de contenido audiovisual, desarrollada con **Laravel**. Su arquitectura es clara, escalable y basada en relaciones entre entidades, ofreciendo una experiencia similar a plataformas comerciales de streaming.

---

## 📚 Contenido disponible

- 🎥 **Películas** – Explora y gestiona todo el contenido cinematográfico.  
- 📺 **Series** – Visualiza temporadas, episodios y sus detalles.  
- 📖 **Documentales** – Organiza y consulta documentales según categorías.

---

## 🏗 Estructura de la plataforma

- 📹 **Media:**  
  Módulo principal donde se gestiona todo el contenido audiovisual. Incluye información detallada como formato, estreno, director y géneros asociados.

- 🏷️ **Géneros:**  
  Sistema de categorización que permite organizar el contenido y facilitar la búsqueda según preferencias del usuario.

- 👨‍🎤 **Directores:**  
  Sección que agrupa el contenido por autor, mostrando todas las obras asociadas a cada director.

- ⚙️ **Usuarios:**  
  Gestión de usuarios registrados y control de acceso a la plataforma.

---

## 🔑 Funcionalidades destacadas

- Acceso al perfil del usuario autenticado desde la parte superior derecha.  
- Posibilidad de personalizar la experiencia del usuario.  
- Preparada para evolucionar con funcionalidades avanzadas como:  
  - ⭐ Listas de favoritos  
  - ❤️ Valoraciones  
  - 🔮 Recomendaciones personalizadas

---

## 🚀 Cómo usar

1️⃣ **Clonar el repositorio**

```bash
git clone https://github.com/tu-usuario/streamroll.git
cd streamroll
```

2️⃣ **Levantar la aplicación con Docker**

```bash
docker compose up -d
```

Esto levantará los servicios necesarios: **PHP + Apache** y **MySQL**.

3️⃣ **Configurar entorno**

```bash
cp .env.example .env
```

Actualiza los datos de la base de datos según tu contenedor MySQL. Luego instala dependencias y ejecuta migraciones:

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

4️⃣ **Acceder a la aplicación**

Abre tu navegador y entra a:

```
http://localhost:8000
```

---

## 📌 Recomendaciones

- Verifica que los datos estén completos antes de eliminar cualquier registro.  
- Mantén el catálogo organizado para mejorar la experiencia de navegación.  
- La plataforma está diseñada para evolucionar, añade módulos según tus necesidades.
