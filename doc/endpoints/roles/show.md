# Endpoint: Obtener Rol Específico

## Descripción
Obtiene la información detallada de un rol específico por su ID.

## Detalles del Endpoint
- **URL**: `/api/roles/{id}`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.read`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del rol a obtener |

## Ejemplo de Solicitud
```http
GET /api/roles/1
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "role": {
      "role_id": 1,
      "name": "Administrador",
      "slug": "admin",
      "description": "Rol de administrador del sistema",
      "permissions": [
        "users.create",
        "users.read",
        "users.update",
        "users.delete",
        "roles.create",
        "roles.read",
        "roles.update",
        "roles.delete"
      ],
      "is_active": true,
      "created_at": "2025-10-15T10:00:00.000000Z",
      "updated_at": "2025-10-15T10:00:00.000000Z"
    }
  },
  "message": "Rol obtenido exitosamente"
}
```

## Respuestas de Error

### Código: 404 Not Found
**Rol no encontrado**
```json
{
  "success": false,
  "message": "Rol no encontrado",
  "error": "No query results for model [App\\Models\\Role] 999"
}
```

### Código: 500 Internal Server Error
**Error al obtener rol**
```json
{
  "success": false,
  "message": "Error al obtener rol",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El ID del rol debe existir en la base de datos
- Devuelve información completa del rol incluyendo sus permisos
- Útil para mostrar detalles del rol en interfaces de administración
- Incluye timestamps de creación y actualización
