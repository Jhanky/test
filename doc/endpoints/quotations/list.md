# Listar Cotizaciones

Obtiene una lista paginada de cotizaciones con opciones de filtrado y ordenamiento.

## Endpoint

```http
GET /api/quotations
```

## Parámetros de consulta

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `status_id` | integer | Filtrar por ID de estado |
| `system_type` | string | Filtrar por tipo de sistema (On-grid, Off-grid, Híbrido, Interconectado) |
| `client_id` | integer | Filtrar por ID de cliente |
| `search` | string | Buscar por nombre de proyecto o información de cliente |
| `sort_by` | string | Campo por el cual ordenar (por defecto: `created_at`) |
| `sort_order` | string | Dirección del ordenamiento (`asc` o `desc`, por defecto: `desc`) |
| `per_page` | integer | Número de registros por página (por defecto: 15) |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "quotation_id": 1,
        "client_id": 1,
        "user_id": 2,
        "project_name": "Proyecto Residencial Solar",
        "system_type": "On-grid",
        "power_kwp": 5.50,
        "panel_count": 15,
        "requires_financing": false,
        "profit_percentage": 0.150,
        "iva_profit_percentage": 0.190,
        "commercial_management_percentage": 0.050,
        "administration_percentage": 0.100,
        "contingency_percentage": 0.030,
        "withholding_percentage": 0.040,
        "status_id": 1,
        "subtotal": 5000000.00,
        "profit": 750000.00,
        "profit_iva": 142500.00,
        "commercial_management": 250000.00,
        "administration": 500000.00,
        "contingency": 150000.00,
        "withholdings": 200000.00,
        "total_value": 7092500.00,
        "subtotal2": 6000000.00,
        "subtotal3": 7000000.00,
        "created_at": "2025-10-27T10:30:00.000000Z",
        "updated_at": "2025-10-27T10:30:00.000000Z",
        "quotation_number": "COT-000001",
        "client": {
          "client_id": 1,
          "name": "Juan Pérez",
          "nic": "1234567890",
          "client_type": "Persona Natural",
          "department_id": 1,
          "city_id": 5
        },
        "user": {
          "id": 2,
          "name": "María González",
          "email": "maria@empresa.com"
        }
      }
    ],
    "first_page_url": "http://localhost:8000/api/quotations?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/quotations?page=1",
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http://localhost:8000/api/quotations?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "next_page_url": null,
    "path": "http://localhost:8000/api/quotations",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
  },
  "message": "Cotizaciones obtenidas exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener cotizaciones",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Cotizaciones obtenidas exitosamente |
| 500 | Error interno del servidor |
