# Endpoint: Permisos Disponibles

## Descripción
Obtiene una lista de todos los permisos disponibles en el sistema, organizados por categorías.

## Detalles del Endpoint
- **URL**: `/api/roles/permissions`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/roles/permissions
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "permissions": {
      "users": [
        "users.create",
        "users.read",
        "users.update",
        "users.delete"
      ],
      "roles": [
        "roles.create",
        "roles.read",
        "roles.update",
        "roles.delete"
      ],
      "projects": [
        "projects.create",
        "projects.read",
        "projects.update",
        "projects.delete"
      ],
      "financial": [
        "financial.read",
        "financial.update",
        "financial.reports"
      ],
      "commercial": [
        "commercial.read",
        "commercial.update",
        "commercial.reports"
      ],
      "settings": [
        "settings.read",
        "settings.update"
      ],
      "reports": [
        "reports.create",
        "reports.read",
        "reports.update",
        "reports.delete"
      ],
      "support": [
        "support.read",
        "support.update",
        "support.delete"
      ]
    }
  },
  "message": "Permisos obtenidos exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener permisos**
```json
{
  "success": false,
  "message": "Error al obtener permisos",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Los permisos están organizados por categorías para facilitar su selección
- Esta lista representa todos los permisos disponibles en el sistema
- Es útil para la creación y edición de roles
- Se puede usar para construir interfaces de selección de permisos en aplicaciones frontend
