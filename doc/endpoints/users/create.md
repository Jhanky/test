# Endpoint: Crear Nuevo Usuario

## Descripción
Crea un nuevo usuario en el sistema con los datos proporcionados.

## Detalles del Endpoint
- **URL**: `/api/users`
- **Método**: `POST`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.create`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| name | string | Sí | Nombre completo del usuario |
| email | string | Sí | Correo electrónico único del usuario (debe terminar en @energy4cero.com) |
| password | string | Sí | Contraseña del usuario (mínimo 6 caracteres) |
| phone | string | No | Número de teléfono del usuario |
| department | string | No | Departamento donde trabaja el usuario |
| position | string | No | Cargo o posición del usuario |
| role_id | integer | Sí | ID del rol asignado al usuario |
| is_active | boolean | No | Estado del usuario (por defecto: true) |

## Ejemplo de Solicitud
```json
{
  "name": "María González",
  "email": "maria.gonzalez@energy4cero.com",
  "password": "contraseña123",
  "phone": "0987654321",
  "department": "Marketing",
  "position": "Especialista",
  "role_id": 3,
  "is_active": true
}
```

## Respuestas Exitosas

### Código: 201 Created
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 2,
      "name": "María González",
      "email": "maria.gonzalez@energy4cero.com",
      "phone": "0987654321",
      "department": "Marketing",
      "position": "Especialista",
      "is_active": true,
      "role_id": 3,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:00:00.000000Z",
      "role": {
        "id": 3,
        "name": "Empleado",
        "slug": "employee",
        "description": "Rol de empleado",
        "permissions": ["clients.read"],
        "is_active": true,
        "created_at": "2025-10-15T10:00:00.000000Z",
        "updated_at": "2025-10-15T10:00:00.000000Z"
      }
    }
  },
  "message": "Usuario creado exitosamente"
}
```

## Respuestas de Error

### Código: 422 Unprocessable Entity
**Datos de entrada inválidos**
```json
{
  "success": false,
  "message": "Datos de entrada inválidos",
  "errors": {
    "name": [
      "El nombre es obligatorio"
    ],
    "email": [
      "El email es obligatorio",
      "El email debe tener un formato válido",
      "Este email ya está registrado",
      "Solo se permiten emails con dominio @energy4cero.com"
    ],
    "password": [
      "La contraseña es obligatoria",
      "La contraseña debe tener al menos 6 caracteres"
    ],
    "role_id": [
      "El rol es obligatorio",
      "El rol seleccionado no existe"
    ]
  }
}
```

### Código: 500 Internal Server Error
**Error al crear usuario**
```json
{
  "success": false,
  "message": "Error al crear usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El email debe ser único en el sistema
- El email debe pertenecer al dominio @energy4cero.com
- La contraseña se almacena en forma encriptada
- Por defecto, los nuevos usuarios se crean con estado activo
- El rol_id debe corresponder a un rol existente en el sistema
