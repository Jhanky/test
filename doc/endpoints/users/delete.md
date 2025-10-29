# Endpoint: Eliminar Usuario

## Descripción
Elimina un usuario específico del sistema de forma permanente.

## Detalles del Endpoint
- **URL**: `/api/users/{id}`
- **Método**: `DELETE`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.delete`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del usuario a eliminar |

## Ejemplo de Solicitud
```http
DELETE /api/users/2
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Usuario eliminado exitosamente"
}
```

## Respuestas de Error

### Código: 403 Forbidden
**No se puede eliminar el usuario administrador principal**
```json
{
  "success": false,
  "message": "No se puede eliminar el usuario administrador principal"
}
```

### Código: 500 Internal Server Error
**Error al eliminar usuario**
```json
{
  "success": false,
  "message": "Error al eliminar usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El usuario con email "admin@energy4cero.com" no puede ser eliminado
- La eliminación es permanente y no se puede deshacer
- Todos los datos relacionados con el usuario también se eliminarán
- Se recomienda desactivar usuarios en lugar de eliminarlos si se necesita mantener registros históricos
