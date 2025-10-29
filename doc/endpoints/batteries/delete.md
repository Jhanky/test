# Eliminar Batería

Elimina una batería del sistema.

## Endpoint

```http
DELETE /api/batteries/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la batería a eliminar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "message": "Batería eliminada exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al eliminar la batería",
  "error": "No query results for model [App\\Models\\Battery] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Batería eliminada exitosamente |
| 404 | Batería no encontrada |
| 500 | Error interno del servidor |
