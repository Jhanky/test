# Crear Inversor

Crea un nuevo inversor en el sistema.

## Endpoint

```http
POST /api/inverters
```

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
| `is_active` | boolean | No | Estado del inversor (por defecto: true) |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "inverter_id": 1,
    "name": "Inversor Ejemplo",
    "model": "Modelo XYZ",
    "power_output_kw": 5.00,
    "grid_type": "Monofásico",
    "system_type": "On-Grid",
    "price": 2500.00,
    "technical_sheet_path": "technical_sheets/inverters/example.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T12:00:00.000000Z"
  },
  "message": "Inversor creado exitosamente"
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
    ],
    "model": [
      "El campo modelo es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al crear el inversor",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 201 | Inversor creado exitosamente |
| 422 | Error de validación |
| 500 | Error interno del servidor |
