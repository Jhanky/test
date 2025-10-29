# Mostrar Cotización

Obtiene la información detallada de una cotización específica, incluyendo productos, ítems y todos los porcentajes asociados.

## Endpoint

```http
GET /api/quotations/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la cotización a obtener |

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
    "quotation_id": 1,
    "client_id": 1,
    "user_id": 2,
    "project_name": "Proyecto Residencial Solar",
    "system_type": "On-grid",
    "power_kwp": "5.50",
    "panel_count": 15,
    "requires_financing": 0,
    "profit_percentage": "0.150",
    "iva_profit_percentage": "0.190",
    "commercial_management_percentage": "0.050",
    "administration_percentage": "0.100",
    "contingency_percentage": "0.030",
    "withholding_percentage": "0.040",
    "subtotal": 5000000,
    "profit": 750000,
    "profit_iva": 142500,
    "commercial_management": 250000,
    "administration": 500000,
    "contingency": 150000,
    "withholdings": 200000,
    "total_value": 7092500,
    "creation_date": "2025-10-27T10:30:00.000000Z",
    "subtotal2": 6000000,
    "subtotal3": 7000000,
    "status_id": 1,
    "status": {
      "status_id": 1,
      "name": "Borrador",
      "description": "Cotización en estado inicial",
      "color": "#6c757d"
    },
    "client": {
      "client_id": 1,
      "name": "Juan Pérez",
      "nic": "1234567890",
      "client_type": "Persona Natural",
      "email": "juan.perez@example.com",
      "phone": "3001234567"
    },
    "user": {
      "id": 2,
      "name": "María González",
      "email": "maria@empresa.com"
    },
    "products": [
      {
        "used_product_id": 1,
        "quotation_id": 1,
        "product_id": 5,
        "product_type": "panel",
        "quantity": 15,
        "unit_price": "450000.00",
        "partial_value": "6750000.00",
        "profit_percentage": "0.150",
        "profit": "1012500.00",
        "total_value": "7762500.00"
      },
      {
        "used_product_id": 2,
        "quotation_id": 1,
        "product_id": 3,
        "product_type": "inverter",
        "quantity": 1,
        "unit_price": "2500000.00",
        "partial_value": "2500000.00",
        "profit_percentage": "0.150",
        "profit": "375000.00",
        "total_value": "2875000.00"
      }
    ],
    "quotation_items": [
      {
        "quotation_item_id": 1,
        "quotation_id": 1,
        "description": "Instalación y configuración del sistema",
        "item_type": "servicio",
        "quantity": "1.00",
        "unit": "servicio",
        "unit_price": "500000.00",
        "partial_value": "500000.00",
        "profit_percentage": "0.150",
        "profit": "75000.00",
        "total_value": "575000.00"
      },
      {
        "quotation_item_id": 2,
        "quotation_id": 1,
        "description": "Cableado fotovoltaico",
        "item_type": "material",
        "quantity": "100.00",
        "unit": "metros",
        "unit_price": "2500.00",
        "partial_value": "250000.00",
        "profit_percentage": "0.150",
        "profit": "37500.00",
        "total_value": "287500.00"
      }
    ]
  },
  "message": "Cotización obtenida exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Cotización no encontrada"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Cotización obtenida exitosamente |
| 404 | Cotización no encontrada |
| 500 | Error interno del servidor |
