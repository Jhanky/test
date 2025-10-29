# Crear Batería

Crea una nueva batería en el sistema.

## Endpoint

```http
POST /api/batteries
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
| `name` | string | Sí | Nombre único de la batería |
| `model` | string | Sí | Modelo único de la batería |
| `type` | string | Sí | Tipo de batería |
| `price` | number | Sí | Precio de la batería |
| `ah_capacity` | number | Sí | Capacidad en amperios-hora |
| `voltage` | number | Sí | Voltaje de la batería |
| `technical_sheet` | file | No | Ficha técnica en formato PDF (máx. 10MB) |
| `is_active` | boolean | No | Estado de la batería (por defecto: true) |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "battery_id": 1,
    "name": "Batería Ejemplo",
    "model": "Modelo XYZ",
    "type": "Litio",
    "price": 1500.00,
    "ah_capacity": 200.00,
    "voltage": 48.00,
    "technical_sheet_path": "technical_sheets/batteries/example.pdf",
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T12:00:00.000000Z"
  },
  "message": "Batería creada exitosamente"
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
  "message": "Error al crear la batería",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 201 | Batería creada exitosamente |
| 422 | Error de validación |
| 500 | Error interno del servidor |
