# Back-End-Centro-de-computo-
Codigo Back end del centro de computo en el framework de laravel 

## Pasos para levantar proyecto localmente

### 1. Clonar el repositorio
Desde GitLab
```bash
git clone https://gitlab.pero.mx/fic-5-4-2025/equipo-1/controlcentrocomputo-web-y-apis.git
```
Desde GitHub
```bash
git clone https://github.com/4N70N1017/Back-End-Centro-de-computo-.git
```

### 2. Instalar dependencias de PHP/Laravel
```bash
composer install
```

### 3. Duplicar el `.env.example` y al nuevo reenombrarlo a `.env`

### 4. Generar la Key
```bash
php artisan key:generate
```

### 5. Configurar variables de entorno en `.env` (PROXIMAMENTE)

### 6. Crear BD y ejecutar migraciones
```bash
php artisan migrate
```

### 7. Levantar el servidor local
```bash
php artisan serve
```
