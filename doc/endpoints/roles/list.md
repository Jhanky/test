# Endpoint: Listar Roles

## Descripción
Obtiene una lista de roles con opciones de filtrado, ordenamiento y paginación.

## Detalles del Endpoint
- **URL**: `/api/roles`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.read`

## Parámetros de Consulta

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| search | string | No | Texto para buscar en nombre, descripción o slug |
| is_active | boolean | No | Filtrar por estado (true/false) |
| sort_by | string | No | Campo por el cual ordenar (por defecto: name) |
| sort_order | string | No | Orden (asc/desc) |
| per_page | integer | No | Número de registros por página (por defecto: 15) |

## Ejemplo de Solicitud
```http
GET /api/roles?search=admin&is_active=true&sort_by=name&sort_order=asc&per_page=10
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "roles": [
      {
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
    ],
    "pagination": {
      "current_page": 1,
      "per_page": 10,
      "total": 1,
      "last_page": 1,
      "from": 1,
      "to": 1
    },
    "stats": {
      "total": 3,
      "active": 3,
      "inactive": 0
    }
  },
  "message": "Roles obtenidos exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener roles**
```json
{
  "success": false,
  "message": "Error al obtener roles",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Los resultados se devuelven paginados por defecto
- Se incluyen estadísticas generales de roles en cada respuesta
- El filtrado es opcional y se puede combinar múltiples parámetros
- El ordenamiento por defecto es por nombre en orden ascendente
