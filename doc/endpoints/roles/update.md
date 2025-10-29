# Endpoint: Actualizar Rol

## Descripción
Actualiza la información de un rol existente en el sistema.

## Detalles del Endpoint
- **URL**: `/api/roles/{id}`
- **Método**: `PUT`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.update`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| id | integer | Sí | ID del rol a actualizar |
| name | string | No | Nombre único del rol |
| slug | string | No | Identificador único del rol (solo letras minúsculas, números y guiones) |
| description | string | No | Descripción del rol (máximo 500 caracteres) |
| permissions | array | No | Lista de permisos asignados al rol |
| is_active | boolean | No | Estado del rol |

## Ejemplo de Solicitud
```json
{
  "name": "Supervisor de Área",
  "slug": "supervisor-area",
  "description": "Rol de supervisor de área con permisos ampliados",
  "permissions": [
    "users.read",
    "users.update",
    "projects.read",
    "projects.update",
    "reports.read",
    "reports.create"
  ]
}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "role": {
      "role_id": 4,
      "name": "Supervisor de Área",
      "slug": "supervisor-area",
      "description": "Rol de supervisor de área con permisos ampliados",
      "permissions": [
        "users.read",
        "users.update",
        "projects.read",
        "projects.update",
        "reports.read",
        "reports.create"
      ],
      "is_active": true,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:30:00.000000Z"
    }
  },
  "message": "Rol actualizado exitosamente"
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
      "Ya existe un rol con este nombre"
    ],
    "slug": [
      "Ya existe un rol con este slug",
      "El slug solo puede contener letras minúsculas, números y guiones"
    ],
    "permissions": [
      "Los permisos deben ser un array"
    ]
  }
}
```

### Código: 500 Internal Server Error
**Error al actualizar rol**
```json
{
  "success": false,
  "message": "Error al actualizar rol",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Solo se requieren los campos que se desean actualizar
- El nombre y slug del rol deben ser únicos en el sistema si se están actualizando
- Los permisos deben ser seleccionados de la lista de permisos disponibles
- Se actualiza el timestamp de "updated_at" automáticamente
- Los cambios en los permisos afectarán inmediatamente a los usuarios asignados a este rol
