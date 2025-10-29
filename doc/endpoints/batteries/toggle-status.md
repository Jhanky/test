# Cambiar Estado de Batería

Activa o desactiva una batería existente.

## Endpoint

```http
PATCH /api/batteries/{id}/toggle-status
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la batería a activar/desactivar |

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
    "battery_id": 1,
    "name": "Batería Ejemplo",
    "model": "Modelo XYZ",
    "type": "Litio",
    "price": 1500.00,
    "ah_capacity": 200.00,
    "voltage": 48.00,
    "technical_sheet_path": "technical_sheets/batteries/example.pdf",
    "is_active": false,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T13:00:00.000000Z"
  },
  "message": "Batería desactivada exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al cambiar estado de la batería",
  "error": "No query results for model [App\\Models\\Battery] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estado de batería cambiado exitosamente |
| 404 | Batería no encontrada |
| 500 | Error interno del servidor |
