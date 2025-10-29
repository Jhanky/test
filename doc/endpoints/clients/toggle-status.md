# Endpoint: Cambiar Estado de Cliente

## Descripción
Cambia el estado de un cliente entre activo e inactivo sin eliminarlo del sistema.

## Detalles del Endpoint
- **URL**: `/api/clients/{id}/toggle-status`
- **Método**: `PATCH`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.update`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del cliente a modificar |

## Ejemplo de Solicitud
```http
PATCH /api/clients/2/toggle-status
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
**Cuando el cliente se activa**
```json
{
  "success": true,
  "data": {
    "client": {
      "client_id": 2,
      "name": "María González",
      "client_type": "comercial",
      "email": "maria.gonzalez@empresa.com",
      "phone": "0987654321",
      "nic": "987654321",
      "responsible_user_id": 3,
      "department_id": 2,
      "city_id": 10,
      "address": "Carrera 45 #67-89",
      "monthly_consumption": 350.75,
      "notes": "Cliente nuevo con alto potencial",
      "is_active": true,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:45:00.000000Z"
    }
  },
  "message": "Cliente activado exitosamente"
}
```

**Cuando el cliente se desactiva**
```json
{
  "success": true,
  "data": {
    "client": {
      "client_id": 2,
      "name": "María González",
      "client_type": "comercial",
      "email": "maria.gonzalez@empresa.com",
      "phone": "0987654321",
      "nic": "987654321",
      "responsible_user_id": 3,
      "department_id": 2,
      "city_id": 10,
      "address": "Carrera 45 #67-89",
      "monthly_consumption": 350.75,
      "notes": "Cliente nuevo con alto potencial",
      "is_active": false,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:45:00.000000Z"
    }
  },
  "message": "Cliente desactivado exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al cambiar estado del cliente**
```json
{
  "success": false,
  "message": "Error al cambiar estado del cliente",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Es preferible desactivar clientes en lugar de eliminarlos para mantener registros históricos
- Los clientes desactivados no aparecerán en listados filtrados por estado activo
- Los clientes desactivados no cuentan en las estadísticas de clientes activos
- Se actualiza el timestamp de "updated_at" automáticamente
- Esta acción es reversible utilizando el mismo endpoint
