# Endpoint: Cambiar Estado de Rol

## Descripción
Cambia el estado de un rol entre activo e inactivo sin eliminarlo del sistema.

## Detalles del Endpoint
- **URL**: `/api/roles/{id}/toggle-status`
- **Método**: `PATCH`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.update`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del rol a modificar |

## Ejemplo de Solicitud
```http
PATCH /api/roles/4/toggle-status
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
**Cuando el rol se activa**
```json
{
  "success": true,
  "data": {
    "role": {
      "role_id": 4,
      "name": "Supervisor",
      "slug": "supervisor",
      "description": "Rol de supervisor de área",
      "permissions": [
        "users.read",
        "projects.read",
        "reports.read"
      ],
      "is_active": true,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:45:00.000000Z"
    }
  },
  "message": "Rol activado exitosamente"
}
```

**Cuando el rol se desactiva**
```json
{
  "success": true,
  "data": {
    "role": {
      "role_id": 4,
      "name": "Supervisor",
      "slug": "supervisor",
      "description": "Rol de supervisor de área",
      "permissions": [
        "users.read",
        "projects.read",
        "reports.read"
      ],
      "is_active": false,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:45:00.000000Z"
    }
  },
  "message": "Rol desactivado exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al cambiar estado del rol**
```json
{
  "success": false,
  "message": "Error al cambiar estado del rol",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Es preferible desactivar roles en lugar de eliminarlos para mantener registros históricos
- Los roles desactivados no pueden ser asignados a nuevos usuarios
- Los usuarios que ya tienen un rol desactivado lo conservan hasta que se les asigne otro rol
- Los roles desactivados no cuentan en las estadísticas de roles activos
- Se actualiza el timestamp de "updated_at" automáticamente
