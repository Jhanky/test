# Mostrar Inversor

Obtiene la información detallada de un inversor específico.

## Endpoint

```http
GET /api/inverters/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del inversor a obtener |

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
  "message": "Inversor obtenido exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Inversor no encontrado",
  "error": "No query results for model [App\\Models\\Inverter] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Inversor obtenido exitosamente |
| 404 | Inversor no encontrado |
| 500 | Error interno del servidor |
