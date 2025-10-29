# Endpoint: Eliminar Cliente

## Descripción
Elimina un cliente específico del sistema de forma permanente.

## Detalles del Endpoint
- **URL**: `/api/clients/{id}`
- **Método**: `DELETE`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.update`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del cliente a eliminar |

## Ejemplo de Solicitud
```http
DELETE /api/clients/2
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Cliente eliminado exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al eliminar cliente**
```json
{
  "success": false,
  "message": "Error al eliminar cliente",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- La eliminación es permanente y no se puede deshacer
- Todos los datos relacionados con el cliente también se eliminarán
- Se recomienda desactivar clientes en lugar de eliminarlos si se necesita mantener registros históricos
- Asegúrese de que realmente desea eliminar el cliente antes de ejecutar este endpoint
