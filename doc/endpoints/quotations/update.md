# Actualizar Cotización

Actualiza la información de una cotización existente. Cuando se editan productos o items, se deben enviar todos los valores recalculados porque los cambios afectan los totales.

## Endpoint

```http
PUT /api/quotations/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la cotización a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: application/json
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `client_id` | integer | No | ID del cliente |
| `user_id` | integer | No | ID del usuario (vendedor) |
| `project_name` | string | No | Nombre del proyecto |
| `system_type` | string | No | Tipo de sistema (On-grid, Off-grid, Híbrido) |
| `power_kwp` | number | No | Potencia del sistema en kWp |
| `panel_count` | integer | No | Cantidad de paneles |
| `requires_financing` | boolean | No | Si requiere financiación |
| `profit_percentage` | number | No | Porcentaje de ganancia (0.000 - 1.000) |
| `iva_profit_percentage` | number | No | Porcentaje de IVA sobre ganancia (0.000 - 1.000) |
| `commercial_management_percentage` | number | No | Porcentaje de gestión comercial (0.000 - 1.000) |
| `administration_percentage` | number | No | Porcentaje de administración (0.000 - 1.000) |
| `contingency_percentage` | number | No | Porcentaje de contingencia (0.000 - 1.000) |
| `withholding_percentage` | number | No | Porcentaje de retenciones (0.000 - 1.000) |
| `status_id` | integer | No | ID del estado |
| `subtotal` | number | No | Subtotal |
| `profit` | number | No | Ganancia |
| `profit_iva` | number | No | IVA sobre ganancia |
| `commercial_management` | number | No | Gestión comercial |
| `administration` | number | No | Administración |
| `contingency` | number | No | Contingencia |
| `withholdings` | number | No | Retenciones |
| `total_value` | number | No | Valor total |
| `subtotal2` | number | No | Subtotal 2 |
| `subtotal3` | number | No | Subtotal 3 |
| `used_products` | array | No | Lista de productos utilizados |
| `used_products.*.used_product_id` | integer | No | ID del producto usado |
| `used_products.*.quantity` | integer | No | Cantidad |
| `used_products.*.unit_price` | number | No | Precio unitario |
| `used_products.*.profit_percentage` | number | No | Porcentaje de ganancia (0.000 - 1.000) |
| `used_products.*.partial_value` | number | No | Valor parcial |
| `used_products.*.profit` | number | No | Ganancia |
| `used_products.*.total_value` | number | No | Valor total |
| `items` | array | No | Lista de items adicionales |
| `items.*.item_id` | integer | No | ID del item |
| `items.*.description` | string | No | Descripción del item |
| `items.*.item_type` | string | No | Tipo de item |
| `items.*.quantity` | number | No | Cantidad |
| `items.*.unit` | string | No | Unidad de medida |
| `items.*.unit_price` | number | No | Precio unitario |
| `items.*.profit_percentage` | number | No | Porcentaje de ganancia (0.000 - 1.000) |
| `items.*.partial_value` | number | No | Valor parcial |
| `items.*.profit` | number | No | Ganancia |
| `items.*.total_value` | number | No | Valor total |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "quotation_id": 2,
    "client_id": 3,
    "user_id": 2,
    "project_name": "Proyecto Comercial Solar Actualizado",
    "system_type": "Híbrido",
    "power_kwp": 18.50,
    "panel_count": 45,
    "requires_financing": true,
    "profit_percentage": 0.120,
    "iva_profit_percentage": 0.190,
    "commercial_management_percentage": 0.050,
    "administration_percentage": 0.080,
    "contingency_percentage": 0.020,
    "withholding_percentage": 0.030,
    "status_id": 1,
    "subtotal": 14500000.00,
    "profit": 1740000.00,
    "profit_iva": 330600.00,
    "commercial_management": 725000.00,
    "administration": 1160000.00,
    "contingency": 290000.00,
    "withholdings": 435000.00,
    "total_value": 19025600.00,
    "subtotal2": 16675000.00,
    "subtotal3": 18590600.00,
    "updated_at": "2025-10-27T15:30:00.000000Z",
    "used_products_count": 0,
    "items_count": 0
  },
  "message": "Cotización actualizada exitosamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "project_name": [
      "El campo project name no debe exceder 200 caracteres."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al actualizar cotización",
  "error": "No query results for model [App\\Models\\Quotation] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Cotización actualizada exitosamente |
| 404 | Cotización no encontrada |
| 422 | Error de validación |
| 500 | Error interno del servidor |
