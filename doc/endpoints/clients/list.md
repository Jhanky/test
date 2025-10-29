# Endpoint: Listar Clientes

## Descripción
Obtiene una lista de clientes con opciones de filtrado, ordenamiento y paginación.

## Detalles del Endpoint
- **URL**: `/api/clients`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.read`

## Parámetros de Consulta

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| search | string | No | Texto para buscar en nombre, email, teléfono o dirección |
| is_active | boolean | No | Filtrar por estado (true/false) |
| client_type | string | No | Filtrar por tipo de cliente (residencial/comercial/empresa) |
| sort_by | string | No | Campo por el cual ordenar (por defecto: client_id) |
| sort_order | string | No | Orden (asc/desc, por defecto: desc) |
| per_page | integer | No | Número de registros por página (por defecto: 15) |

## Ejemplo de Solicitud
```http
GET /api/clients?search=juan&is_active=true&client_type=comercial&sort_by=name&sort_order=asc&per_page=10
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "clients": [
      {
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
      "total": 45,
      "active": 42,
      "inactive": 3
    }
  },
  "message": "Clientes obtenidos exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener clientes**
```json
{
  "success": false,
  "message": "Error al obtener clientes",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Los resultados se devuelven paginados por defecto
- Se incluyen estadísticas generales de clientes en cada respuesta
- El filtrado es opcional y se puede combinar múltiples parámetros
- El ordenamiento por defecto es por ID en orden descendente (más recientes primero)
- Se incluyen relaciones con usuario responsable, departamento y ciudad
