# Crear Panel

Crea un nuevo panel en el sistema.

## Endpoint

```http
POST /api/panels
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
| `model` | string | Sí | Modelo único del panel |
| `brand` | string | Sí | Marca del panel |
| `power_output` | number | Sí | Potencia de salida en watts |
| `price` | number | Sí | Precio del panel |
| `technical_sheet` | file | No | Ficha técnica en formato PDF (máx. 10MB) |
| `is_active` | boolean | No | Estado del panel (por defecto: true) |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "panel_id": 1,
    "model": "Modelo XYZ",
    "brand": "Marca Ejemplo",
    "power_output": 400.00,
    "price": 150.00,
    "technical_sheet_path": "technical_sheets/panels/example.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T12:00:00.000000Z"
  },
  "message": "Panel creado exitosamente"
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
    ],
    "brand": [
      "El campo marca es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al crear el panel",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 201 | Panel creado exitosamente |
| 422 | Error de validación |
| 500 | Error interno del servidor |
