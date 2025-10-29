# Estadísticas de Baterías

Obtiene estadísticas generales sobre las baterías registradas en el sistema.

## Endpoint

```http
GET /api/batteries/statistics
```

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
    "total": 15,
    "average_price": 1200
  },
  "message": "Estadísticas de baterías obtenidas exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener estadísticas de baterías",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estadísticas obtenidas exitosamente |
| 500 | Error interno del servidor |
