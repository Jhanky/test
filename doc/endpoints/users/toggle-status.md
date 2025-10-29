# Endpoint: Cambiar Estado de Usuario

## Descripción
Cambia el estado de un usuario entre activo e inactivo sin eliminarlo del sistema.

## Detalles del Endpoint
- **URL**: `/api/users/{id}/toggle-status`
- **Método**: `PATCH`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.update`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del usuario a modificar |

## Ejemplo de Solicitud
```http
PATCH /api/users/2/toggle-status
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
**Cuando el usuario se activa**
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
      "updated_at": "2025-10-27T12:45:00.000000Z",
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
  "message": "Usuario activado exitosamente"
}
```

**Cuando el usuario se desactiva**
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
      "is_active": false,
      "role_id": 3,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:45:00.000000Z",
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
  "message": "Usuario desactivado exitosamente"
}
```

## Respuestas de Error

### Código: 403 Forbidden
**No se puede desactivar el usuario administrador principal**
```json
{
  "success": false,
  "message": "No se puede desactivar el usuario administrador principal"
}
```

### Código: 500 Internal Server Error
**Error al cambiar estado del usuario**
```json
{
  "success": false,
  "message": "Error al cambiar estado del usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El usuario con email "admin@energy4cero.com" no puede ser desactivado
- Es preferible desactivar usuarios en lugar de eliminarlos para mantener registros históricos
- Los usuarios desactivados no pueden iniciar sesión en el sistema
- Los usuarios desactivados no cuentan en las estadísticas de usuarios activos
- Se actualiza el timestamp de "updated_at" automáticamente
