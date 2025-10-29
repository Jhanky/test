# Eliminar Cotización

Elimina una cotización del sistema.

## Endpoint

```http
DELETE /api/quotations/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la cotización a eliminar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "message": "Cotización eliminada exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al eliminar cotización",
  "error": "No query results for model [App\\Models\\Quotation] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Cotización eliminada exitosamente |
| 404 | Cotización no encontrada |
| 500 | Error interno del servidor |
