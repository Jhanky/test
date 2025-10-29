# Listar Paneles

Obtiene una lista paginada de paneles con opciones de filtrado y ordenamiento.

## Endpoint

```http
GET /api/panels
```

## Parámetros de consulta

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `search` | string | Buscar paneles por modelo |
| `is_active` | boolean | Filtrar por estado activo/inactivo |
| `sort_by` | string | Campo por el cual ordenar (por defecto: `created_at`) |
| `sort_order` | string | Dirección del ordenamiento (`asc` o `desc`, por defecto: `desc`) |
| `per_page` | integer | Número de registros por página (por defecto: 15) |

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
    "panels": [
      {
        "panel_id": 1,
        "model": "Modelo XYZ",
        "brand": "Marca Ejemplo",
        "power_output": 400.00,
        "price": 150.00,
        "technical_sheet_path": "technical_sheets/panels/example.pdf",
        "is_active": true,
        "created_at": "2025-10-27T12:00:00.000000Z",
        "updated_at": "2025-10-27T12:00:00.000000Z"
      }
    ],
    "pagination": {
      "current_page": 1,
      "per_page": 15,
      "total": 1,
      "last_page": 1,
      "from": 1,
      "to": 1
    }
  },
  "message": "Paneles obtenidos exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener paneles",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Paneles obtenidos exitosamente |
| 500 | Error interno del servidor |
