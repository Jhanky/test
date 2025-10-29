# Endpoint: Crear Nuevo Rol

## Descripción
Crea un nuevo rol en el sistema con los datos y permisos proporcionados.

## Detalles del Endpoint
- **URL**: `/api/roles`
- **Método**: `POST`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.create`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| name | string | Sí | Nombre único del rol |
| slug | string | Sí | Identificador único del rol (solo letras minúsculas, números y guiones) |
| description | string | No | Descripción del rol (máximo 500 caracteres) |
| permissions | array | Sí | Lista de permisos asignados al rol |
| is_active | boolean | No | Estado del rol (por defecto: true) |

## Ejemplo de Solicitud
```json
{
  "name": "Supervisor",
  "slug": "supervisor",
  "description": "Rol de supervisor de área",
  "permissions": [
    "users.read",
    "projects.read",
    "reports.read"
  ],
  "is_active": true
}
```

## Respuestas Exitosas

### Código: 201 Created
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
      "updated_at": "2025-10-27T12:00:00.000000Z"
    }
  },
  "message": "Rol creado exitosamente"
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
      "El nombre es obligatorio",
      "Ya existe un rol con este nombre"
    ],
    "slug": [
      "El slug es obligatorio",
      "Ya existe un rol con este slug",
      "El slug solo puede contener letras minúsculas, números y guiones"
    ],
    "permissions": [
      "Los permisos son obligatorios",
      "Los permisos deben ser un array"
    ]
  }
}
```

### Código: 500 Internal Server Error
**Error al crear rol**
```json
{
  "success": false,
  "message": "Error al crear rol",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El nombre y slug del rol deben ser únicos en el sistema
- El slug solo puede contener letras minúsculas, números y guiones
- Los permisos deben ser seleccionados de la lista de permisos disponibles
- Por defecto, los nuevos roles se crean con estado activo
- Se recomienda usar nombres descriptivos y slugs claros para facilitar la identificación
