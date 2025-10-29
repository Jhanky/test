# Endpoint: Actualizar Usuario

## Descripción
Actualiza la información de un usuario existente en el sistema.

## Detalles del Endpoint
- **URL**: `/api/users/{id}`
- **Método**: `PUT`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.update`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| id | integer | Sí | ID del usuario a actualizar |
| name | string | No | Nombre completo del usuario |
| email | string | No | Correo electrónico único del usuario (debe terminar en @energy4cero.com) |
| password | string | No | Contraseña del usuario (mínimo 6 caracteres) |
| phone | string | No | Número de teléfono del usuario |
| department | string | No | Departamento donde trabaja el usuario |
| position | string | No | Cargo o posición del usuario |
| role_id | integer | No | ID del rol asignado al usuario |
| is_active | boolean | No | Estado del usuario |

## Ejemplo de Solicitud
```json
{
  "name": "María González Actualizada",
  "email": "maria.gonzalez@energy4cero.com",
  "phone": "0987654321",
  "department": "Marketing",
  "position": "Gerente de Marketing",
  "role_id": 2
}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 2,
      "name": "María González Actualizada",
      "email": "maria.gonzalez@energy4cero.com",
      "phone": "0987654321",
      "department": "Marketing",
      "position": "Gerente de Marketing",
      "is_active": true,
      "role_id": 2,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:30:00.000000Z",
      "role": {
        "id": 2,
        "name": "Gerente",
        "slug": "manager",
        "description": "Rol de gerente",
        "permissions": ["users.read", "clients.read"],
        "is_active": true,
        "created_at": "2025-10-15T10:00:00.000000Z",
        "updated_at": "2025-10-15T10:00:00.000000Z"
      }
    }
  },
  "message": "Usuario actualizado exitosamente"
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
    "email": [
      "El email debe tener un formato válido",
      "Este email ya está registrado",
      "Solo se permiten emails con dominio @energy4cero.com"
    ],
    "password": [
      "La contraseña debe tener al menos 6 caracteres"
    ],
    "role_id": [
      "El rol seleccionado no existe"
    ]
  }
}
```

### Código: 500 Internal Server Error
**Error al actualizar usuario**
```json
{
  "success": false,
  "message": "Error al actualizar usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Solo se requieren los campos que se desean actualizar
- El email debe ser único en el sistema si se está actualizando
- Si se proporciona una nueva contraseña, se encriptará automáticamente
- El rol_id debe corresponder a un rol existente en el sistema si se está actualizando
- Se actualiza el timestamp de "updated_at" automáticamente
