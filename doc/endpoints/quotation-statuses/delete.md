# Eliminar Estado de Cotización

Elimina un estado de cotización del sistema. Solo se puede eliminar si no hay cotizaciones asociadas.

## Endpoint

```http
DELETE /api/quotation-statuses/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del estado de cotización a eliminar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "message": "Estado de cotización eliminado exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "No se puede eliminar el estado porque tiene cotizaciones asociadas",
  "error": "Cannot delete status with associated quotations"
}
```

## Respuesta de Error (Estado no encontrado)

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
| 200 | Estado de cotización eliminado exitosamente |
| 404 | Estado de cotización no encontrado |
| 422 | No se puede eliminar el estado porque tiene cotizaciones asociadas |
| 500 | Error interno del servidor |
