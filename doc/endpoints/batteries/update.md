# Actualizar Batería

Actualiza la información de una batería existente.

## Endpoint

```http
PUT /api/batteries/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la batería a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: multipart/form-data
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `name` | string | Sí | Nombre único de la batería |
| `model` | string | Sí | Modelo único de la batería |
| `type` | string | Sí | Tipo de batería |
| `price` | number | Sí | Precio de la batería |
| `ah_capacity` | number | Sí | Capacidad en amperios-hora |
| `voltage` | number | Sí | Voltaje de la batería |
| `technical_sheet` | file | No | Ficha técnica en formato PDF (máx. 10MB) |
| `technical_sheet_path` | string | No | Establecer como `null` para eliminar la ficha técnica existente |
| `is_active` | boolean | No | Estado de la batería |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "battery_id": 1,
    "name": "Batería Actualizada",
    "model": "Modelo XYZ Actualizado",
    "type": "Litio",
    "price": 1600.00,
    "ah_capacity": 220.00,
    "voltage": 48.00,
    "technical_sheet_path": "technical_sheets/batteries/example_updated.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T13:00:00.000000Z"
  },
  "message": "Batería actualizada exitosamente"
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
  "message": "Error al actualizar la batería",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Batería actualizada exitosamente |
| 404 | Batería no encontrada |
| 422 | Error de validación |
| 500 | Error interno del servidor |
