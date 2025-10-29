# Eliminar Panel

Elimina un panel del sistema.

## Endpoint

```http
DELETE /api/panels/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del panel a eliminar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
```

## Respuesta Exitosa

```json
{
  "success": true,
  "message": "Panel eliminado exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al eliminar el panel",
  "error": "No query results for model [App\\Models\\Panel] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Panel eliminado exitosamente |
| 404 | Panel no encontrado |
| 500 | Error interno del servidor |
