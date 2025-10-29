# Eliminar Inversor

Elimina un inversor del sistema.

## Endpoint

```http
DELETE /api/inverters/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del inversor a eliminar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "message": "Inversor eliminado exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al eliminar el inversor",
  "error": "No query results for model [App\\Models\\Inverter] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Inversor eliminado exitosamente |
| 404 | Inversor no encontrado |
| 500 | Error interno del servidor |
