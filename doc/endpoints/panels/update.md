# Actualizar Panel

Actualiza la información de un panel existente.

## Endpoint

```http
PUT /api/panels/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del panel a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: multipart/form-data
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `model` | string | Sí | Modelo único del panel |
| `brand` | string | Sí | Marca del panel |
| `power_output` | number | Sí | Potencia de salida en watts |
| `price` | number | Sí | Precio del panel |
| `technical_sheet` | file | No | Ficha técnica en formato PDF (máx. 10MB) |
| `technical_sheet_path` | string | No | Establecer como `null` para eliminar la ficha técnica existente |
| `is_active` | boolean | No | Estado del panel |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "panel_id": 1,
    "model": "Modelo XYZ Actualizado",
    "brand": "Marca Ejemplo Actualizada",
    "power_output": 450.00,
    "price": 175.00,
    "technical_sheet_path": "technical_sheets/panels/example_updated.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T13:00:00.000000Z"
  },
  "message": "Panel actualizado exitosamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
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
  "message": "Error al actualizar el panel",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Panel actualizado exitosamente |
| 404 | Panel no encontrado |
| 422 | Error de validación |
| 500 | Error interno del servidor |
