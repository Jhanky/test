# Actualizar Inversor

Actualiza la información de un inversor existente.

## Endpoint

```http
PUT /api/inverters/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del inversor a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: multipart/form-data
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `name` | string | Sí | Nombre único del inversor |
| `model` | string | Sí | Modelo único del inversor |
| `power_output_kw` | number | Sí | Potencia de salida en kW |
| `grid_type` | string | Sí | Tipo de red (Monofásico, Trifásico, etc.) |
| `system_type` | string | Sí | Tipo de sistema (On-Grid, Off-Grid, Hybrid) |
| `price` | number | Sí | Precio del inversor |
| `technical_sheet` | file | No | Ficha técnica en formato PDF (máx. 10MB) |
| `technical_sheet_path` | string | No | Establecer como `null` para eliminar la ficha técnica existente |
| `is_active` | boolean | No | Estado del inversor |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "inverter_id": 1,
    "name": "Inversor Actualizado",
    "model": "Modelo XYZ Actualizado",
    "power_output_kw": 6.00,
    "grid_type": "Trifásico",
    "system_type": "Hybrid",
    "price": 3000.00,
    "technical_sheet_path": "technical_sheets/inverters/example_updated.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T13:00:00.000000Z"
  },
  "message": "Inversor actualizado exitosamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "name": [
      "El campo nombre es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al actualizar el inversor",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Inversor actualizado exitosamente |
| 404 | Inversor no encontrado |
| 422 | Error de validación |
| 500 | Error interno del servidor |
