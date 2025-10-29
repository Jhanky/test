# Endpoint: Obtener Usuario Específico

## Descripción
Obtiene la información detallada de un usuario específico por su ID.

## Detalles del Endpoint
- **URL**: `/api/users/{id}`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.read`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del usuario a obtener |

## Ejemplo de Solicitud
```http
GET /api/users/1
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "user": {
      "id": 1,
      "name": "Juan Pérez",
      "email": "juan.perez@energy4cero.com",
      "phone": "1234567890",
      "department": "Ventas",
      "position": "Gerente",
      "is_active": true,
      "role_id": 2,
      "created_at": "2025-10-20T10:00:00.000000Z",
      "updated_at": "2025-10-20T10:00:00.000000Z",
      "role": {
        "id": 2,
        "name": "Gerente",
        "slug": "gerente",
        "description": "Rol de gerente",
        "permissions": ["users.read", "clients.read"],
        "is_active": true,
        "created_at": "2025-10-15T10:00:00.000000Z",
        "updated_at": "2025-10-15T10:00:00.000000Z"
      }
    }
  },
  "message": "Usuario obtenido exitosamente"
}
```

## Respuestas de Error

### Código: 404 Not Found
**Usuario no encontrado**
```json
{
  "success": false,
  "message": "Usuario no encontrado",
  "error": "No query results for model [App\\Models\\User] 999"
}
```

### Código: 500 Internal Server Error
**Error al obtener usuario**
```json
{
  "success": false,
  "message": "Error al obtener usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El ID del usuario debe existir en la base de datos
- Devuelve información completa del usuario incluyendo su rol
- Útil para mostrar detalles del usuario en interfaces de administración
- Incluye timestamps de creación y actualización
