# Mostrar Batería

Obtiene la información detallada de una batería específica.

## Endpoint

```http
GET /api/batteries/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la batería a obtener |

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
    "is_active": true,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T12:00:00.000000Z"
  },
  "message": "Batería obtenida exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Batería no encontrada",
  "error": "No query results for model [App\\Models\\Battery] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Batería obtenida exitosamente |
| 404 | Batería no encontrada |
| 500 | Error interno del servidor |
