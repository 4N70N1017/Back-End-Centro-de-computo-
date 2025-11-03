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

### 2. Nos vamos a la rama develop
```bash
git checkout develop
```

### 3. Instalar dependencias de PHP/Laravel
```bash
composer install
```

### 4. Duplicar el `.env.example` y al nuevo reenombrarlo a `.env`

### 5. Generar la Key
```bash
php artisan key:generate
```

### 6. Configurar variables de entorno en `.env` (PROXIMAMENTE)

### 7. Crear BD y ejecutar migraciones
```bash
php artisan migrate
```

En caso de no existir la BD, te va a preguntar si la quieres crear, le dices que `yes`:
```bash
WARN  The SQLite database configured for this application does not exist: C:\Users\leo\Desktop\ccprueba\database\database.sqlite.  

Would you like to create it? (yes/no) [yes]
❯ yes
```

> ***NOTA:*** La base de datos en SQLite es temporal.


### 8. Levantar el servidor local
```bash
php artisan serve
```

## Exponer la API en la red local para pruebas

### 1. Obtener tu IP local:
En windows, en la terminal:
```bash
ipconfig
```

Ubicamos la `Dirección IPv4`:
```bash
Dirección IPv4. . . . . . . . . . . . . . : 192.168.100.??
```

### 2. Modificar el `.env`
En la variable de entorno `APP_URL` sustituir por:
```
APP_URL=http://192.168.100.??:8000
```

> ***NOTA:*** Sustituir los `??` por el número real.

### 3. Levantamos el servidor de artisan con:
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### 4. Test
Desde otro dispositivo hacer una consulta a un endpoint de la API:
```
POST -> http://192.168.100.??:8000/api/usuarios/
```
> ***NOTA:*** Sustituir los `??` por el número real.

En el body:
```json
{
    "id_rol": 1,
    "correo": "p@example.com",
    "contrasena": "secreto123",

    "nombre": "Manuel",
    "apellido_paterno": "Noriega",
    "apellido_materno": "Martinez",
    "fecha_nacimiento": "1990-01-15",
    "telefono": "1234567890"
}
```

Deberias ver:
`Status: 201`
```json
{
  "mensaje": "Usuario y empleado creados correctamente",
  "usuario": {
    "id_rol": 1,
    "id_empleado": 1,
    "correo": "p@example.com",
    "id": 1
  },
  "empleado": {
    "nombre": "Manuel",
    "apellido_paterno": "Noriega",
    "apellido_materno": "Martinez",
    "fecha_nacimiento": "1990-01-15",
    "fecha_de_ingreso": "2025-11-03",
    "telefono": "1234567890",
    "url_foto": null,
    "id": 1
  }
}
```