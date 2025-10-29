# Mostrar Estado de Cotización

Obtiene la información detallada de un estado de cotización específico.

## Endpoint

```http
GET /api/quotation-statuses/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del estado de cotización a obtener |

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
    "status_id": 3,
    "name": "Revisada",
    "description": "Cotización revisada por el cliente",
    "color": "#FF9800",
    "is_active": true,
    "created_at": "2025-10-22T12:00:00.000000Z",
    "updated_at": "2025-10-22T12:00:00.000000Z"
  },
  "message": "Estado de cotización obtenido exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Estado de cotización no encontrado",
  "error": "No query results for model [App\\Models\\QuotationStatus] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estado de cotización obtenido exitosamente |
| 404 | Estado de cotización no encontrado |
| 500 | Error interno del servidor |
