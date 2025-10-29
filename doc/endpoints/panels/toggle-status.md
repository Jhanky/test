# Cambiar Estado de Panel

Activa o desactiva un panel existente.

## Endpoint

```http
PATCH /api/panels/{id}/toggle-status
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del panel a activar/desactivar |

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
    "panel_id": 1,
    "model": "Modelo XYZ",
    "brand": "Marca Ejemplo",
    "power_output": 400.00,
    "price": 150.00,
    "technical_sheet_path": "technical_sheets/panels/example.pdf",
    "is_active": false,
    "created_at": "2025-10-27T12:00:00.000000Z",
    "updated_at": "2025-10-27T13:00:00.000000Z"
  },
  "message": "Panel desactivado exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al cambiar estado del panel",
  "error": "No query results for model [App\\Models\\Panel] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estado de panel cambiado exitosamente |
| 404 | Panel no encontrado |
| 500 | Error interno del servidor |
