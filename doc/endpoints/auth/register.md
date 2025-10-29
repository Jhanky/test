# Endpoint: Registrar Nuevo Usuario

## Descripción
Permite registrar un nuevo usuario en el sistema. Esta acción solo puede ser realizada por usuarios con los permisos adecuados.

## Detalles del Endpoint
- **URL**: `/api/auth/register`
- **Método**: `POST`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.create`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| name | string | Sí | Nombre completo del usuario |
| email | string | Sí | Correo electrónico único del usuario |
| password | string | Sí | Contraseña del usuario (mínimo 6 caracteres) |
| password_confirmation | string | Sí | Confirmación de la contraseña |
| phone | string | No | Número de teléfono del usuario |
| department | string | No | Departamento donde trabaja el usuario |
| position | string | No | Cargo o posición del usuario |
| role_id | integer | Sí | ID del rol asignado al usuario |

## Ejemplo de Solicitud
```json
{
  "name": "Nuevo Usuario",
  "email": "nuevo.usuario@energy4cero.com",
  "password": "contraseña123",
  "password_confirmation": "contraseña123",
  "phone": "1234567890",
  "department": "Departamento",
  "position": "Posición",
  "role_id": 2
}
```

## Respuestas Exitosas

### Código: 201 Created
```json
{
  "success": true,
  "message": "Usuario creado exitosamente",
  "data": {
    "user": {
      "id": 2,
      "name": "Nuevo Usuario",
      "email": "nuevo.usuario@energy4cero.com",
      "phone": "1234567890",
      "department": "Departamento",
      "position": "Posición",
      "is_active": true,
      "role": {
        "id": 2,
        "name": "Nombre del Rol",
        "slug": "nombre-del-rol",
        "description": "Descripción del rol",
        "permissions": ["permiso1", "permiso2"],
        "is_active": true
      },
      "permissions": ["permiso1", "permiso2"]
    }
  }
}
```

## Respuestas de Error

### Código: 403 Forbidden
**Permisos insuficientes**
```json
{
  "success": false,
  "message": "No tienes permisos para crear usuarios"
}
```

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
      "El email ya está registrado"
    ],
    "password": [
      "La contraseña es obligatoria",
      "La contraseña debe tener al menos 6 caracteres",
      "Las contraseñas no coinciden"
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
- Solo usuarios con el permiso `users.create` pueden acceder a este endpoint
- El email debe ser único en el sistema
- La contraseña y su confirmación deben coincidir
- El `role_id` debe corresponder a un rol existente en el sistema
- Por defecto, los nuevos usuarios se crean con estado activo (`is_active: true`)
- Este endpoint no envía correos de bienvenida ni notificaciones automáticas
