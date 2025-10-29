# Endpoint: Eliminar Rol

## Descripción
Elimina un rol específico del sistema de forma permanente.

## Detalles del Endpoint
- **URL**: `/api/roles/{id}`
- **Método**: `DELETE`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.delete`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del rol a eliminar |

## Ejemplo de Solicitud
```http
DELETE /api/roles/4
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Rol eliminado exitosamente"
}
```

## Respuestas de Error

### Código: 403 Forbidden
**No se puede eliminar el rol porque tiene usuarios asignados**
```json
{
  "success": false,
  "message": "No se puede eliminar el rol porque tiene 5 usuario(s) asignado(s)"
}
```

### Código: 500 Internal Server Error
**Error al eliminar rol**
```json
{
  "success": false,
  "message": "Error al eliminar rol",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- No se puede eliminar un rol que tiene usuarios asignados
- Antes de eliminar un rol, se deben reasignar los usuarios a otros roles
- La eliminación es permanente y no se puede deshacer
- Todos los datos relacionados con el rol también se eliminarán
- Se recomienda desactivar roles en lugar de eliminarlos si se necesita mantener registros históricos
