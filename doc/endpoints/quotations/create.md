# Crear Cotización

Crea una nueva cotización en el sistema. El backend realiza todos los cálculos automáticamente basándose en los productos, items y porcentajes enviados.

## Endpoint

```http
POST /api/quotations
```

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: application/json
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `client_id` | integer | Sí | ID del cliente |
| `user_id` | integer | Sí | ID del usuario (vendedor) |
| `project_name` | string | Sí | Nombre del proyecto |
| `system_type` | string | Sí | Tipo de sistema (On-grid, Off-grid, Híbrido, Interconectado) |
| `power_kwp` | number | Sí | Potencia del sistema en kWp |
| `panel_count` | integer | Sí | Cantidad de paneles |
| `requires_financing` | boolean | No | Si requiere financiación (por defecto: false) |
| `profit_percentage` | number | Sí | Porcentaje de ganancia (0.000 - 1.000) |
| `iva_profit_percentage` | number | Sí | Porcentaje de IVA sobre ganancia (0.000 - 1.000) |
| `commercial_management_percentage` | number | Sí | Porcentaje de gestión comercial (0.000 - 1.000) |
| `administration_percentage` | number | Sí | Porcentaje de administración (0.000 - 1.000) |
| `contingency_percentage` | number | Sí | Porcentaje de contingencia (0.000 - 1.000) |
| `withholding_percentage` | number | Sí | Porcentaje de retenciones (0.000 - 1.000) |
| `status_id` | integer | No | ID del estado (por defecto: 1 - Borrador) |
| `products` | array | No | Lista de productos utilizados |
| `products.*.product_type` | string | Sí (si se envían productos) | Tipo de producto (panel, inverter, battery) |
| `products.*.product_id` | integer | Sí (si se envían productos) | ID del producto |
| `products.*.quantity` | integer | Sí (si se envían productos) | Cantidad |
| `products.*.unit_price` | number | Sí (si se envían productos) | Precio unitario |
| `products.*.profit_percentage` | number | Sí (si se envían productos) | Porcentaje de ganancia (0.000 - 1.000) |
| `items` | array | No | Lista de items adicionales |
| `items.*.description` | string | Sí (si se envían items) | Descripción del item |
| `items.*.item_type` | string | Sí (si se envían items) | Tipo de item |
| `items.*.quantity` | number | Sí (si se envían items) | Cantidad |
| `items.*.unit` | string | Sí (si se envían items) | Unidad de medida |
| `items.*.unit_price` | number | Sí (si se envían items) | Precio unitario |
| `items.*.profit_percentage` | number | Sí (si se envían items) | Porcentaje de ganancia (0.000 - 1.000) |

## Respuesta Exitosa

```json
{
  "quotation_id": 47,
  "client_id": 5,
  "user_id": 1,
  "project_name": "Instalación Solar Residencial",
  "system_type": "Interconectado",
  "power_kwp": "5.50",
  "panel_count": 12,
  "requires_financing": 0,
  "profit_percentage": "0.150",
  "iva_profit_percentage": "0.190",
  "commercial_management_percentage": "0.050",
  "administration_percentage": "0.030",
  "contingency_percentage": "0.020",
  "withholding_percentage": "0.025",
  "subtotal": 7050000,
  "profit": 1110380,
  "profit_iva": 210971,
  "commercial_management": 352500,
  "administration": 222075,
  "contingency": 148050,
  "withholdings": 227349,
  "total_value": 9321320,
  "creation_date": "2025-07-11T20:52:46.000Z",
  "subtotal2": 7402500,
  "subtotal3": 9093970,
  "status_id": 1,
  "products": [
    {
      "used_product_id": 25,
      "quotation_id": 47,
      "product_id": 3,
      "product_type": "panel",
      "quantity": 12,
      "unit_price": "250000.00",
      "partial_value": "3000000.00",
      "profit_percentage": "0.10",
      "profit": "0.00",
      "total_value": "3000000.00"
    },
    {
      "used_product_id": 26,
      "quotation_id": 47,
      "product_id": 1,
      "product_type": "inverter",
      "quantity": 1,
      "unit_price": "1800000.00",
      "partial_value": "1800000.00",
      "profit_percentage": "0.15",
      "profit": "0.00",
      "total_value": "1800000.00"
    }
  ],
  "quotation_items": [
    {
      "quotation_item_id": 73,
      "quotation_id": 47,
      "description": "Cableado fotovoltaico",
      "item_type": "material_electrico",
      "quantity": "50.00",
      "unit": "metros",
      "unit_price": "5000.00",
      "partial_value": "250000.00",
      "profit_percentage": "0.10",
      "profit": "0.00",
      "total_value": "250000.00"
    },
    {
      "quotation_item_id": 74,
      "quotation_id": 47,
      "description": "Estructura de soporte",
      "item_type": "estructura",
      "quantity": "1.00",
      "unit": "kit",
      "unit_price": "800000.00",
      "partial_value": "800000.00",
      "profit_percentage": "0.12",
      "profit": "0.00",
      "total_value": "800000.00"
    },
    {
      "quotation_item_id": 75,
      "quotation_id": 47,
      "description": "Mano de obra instalación",
      "item_type": "mano_obra",
      "quantity": "1.00",
      "unit": "servicio",
      "unit_price": "1200000.00",
      "partial_value": "1200000.00",
      "profit_percentage": "0.20",
      "profit": "0.00",
      "total_value": "1200000.00"
    }
  ]
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "client_id": [
      "El campo client id es obligatorio."
    ],
    "project_name": [
      "El campo project name es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al crear cotización",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 201 | Cotización creada exitosamente |
| 422 | Error de validación |
| 500 | Error interno del servidor |
