# Endpoint: Listar Usuarios

## Descripción
Obtiene una lista de usuarios con opciones de filtrado, ordenamiento y paginación.

## Detalles del Endpoint
- **URL**: `/api/users`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.read`

## Parámetros de Consulta

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| search | string | No | Texto para buscar en nombre, email, departamento o posición |
| role_id | integer | No | Filtrar por ID de rol |
| department | string | No | Filtrar por departamento |
| is_active | boolean | No | Filtrar por estado (true/false) |
| sort_by | string | No | Campo por el cual ordenar (por defecto: name) |
| sort_order | string | No | Orden (asc/desc) |
| per_page | integer | No | Número de registros por página (por defecto: 15) |

## Ejemplo de Solicitud
```http
GET /api/users?search=juan&role_id=2&is_active=true&sort_by=name&sort_order=asc&per_page=10
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "users": [
      {
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
      "total": 50,
      "active": 45,
      "inactive": 5,
      "by_role": {
        "Administrador": 5,
        "Gerente": 10,
        "Empleado": 35
      },
      "by_department": {
        "Ventas": 20,
        "Marketing": 15,
        "Tecnología": 15
      }
    }
  },
  "message": "Usuarios obtenidos exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener usuarios**
```json
{
  "success": false,
  "message": "Error al obtener usuarios",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Los resultados se devuelven paginados por defecto
- Se incluyen estadísticas generales de usuarios en cada respuesta
- El filtrado es opcional y se puede combinar múltiples parámetros
- El ordenamiento por defecto es por nombre en orden ascendente
