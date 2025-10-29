# Endpoint: Obtener Cliente Específico

## Descripción
Obtiene la información detallada de un cliente específico por su ID.

## Detalles del Endpoint
- **URL**: `/api/clients/{id}`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.read`

## Parámetros de Entrada

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | integer | Sí | ID del cliente a obtener |

## Ejemplo de Solicitud
```http
GET /api/clients/1
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "client": {
      "client_id": 1,
      "name": "Juan Pérez",
      "client_type": "comercial",
      "email": "juan.perez@empresa.com",
      "phone": "1234567890",
      "nic": "123456789",
      "responsible_user_id": 2,
      "department_id": 1,
      "city_id": 5,
      "address": "Calle 123 #45-67",
      "monthly_consumption": 500.50,
      "notes": "Cliente preferencial",
      "is_active": true,
      "created_at": "2025-10-20T10:00:00.000000Z",
      "updated_at": "2025-10-20T10:00:00.000000Z",
      "responsible_user": {
        "id": 2,
        "name": "María González",
        "email": "maria.gonzalez@energy4cero.com"
      },
      "department": {
        "department_id": 1,
        "name": "Bogotá"
      },
      "city": {
        "city_id": 5,
        "name": "Bogotá D.C."
      }
    }
  },
  "message": "Cliente obtenido exitosamente"
}
```

## Respuestas de Error

### Código: 404 Not Found
**Cliente no encontrado**
```json
{
  "success": false,
  "message": "Cliente no encontrado",
  "error": "No query results for model [App\\Models\\Client] 999"
}
```

### Código: 500 Internal Server Error
**Error al obtener cliente**
```json
{
  "success": false,
  "message": "Error al obtener cliente",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El ID del cliente debe existir en la base de datos
- Devuelve información completa del cliente incluyendo sus relaciones
- Útil para mostrar detalles del cliente en interfaces de administración
- Incluye timestamps de creación y actualización
- Se incluyen relaciones con usuario responsable, departamento y ciudad
