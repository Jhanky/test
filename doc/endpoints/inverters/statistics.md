# Estadísticas de Inversores

Obtiene estadísticas generales sobre los inversores registrados en el sistema.

## Endpoint

```http
GET /api/inverters/statistics
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
    "total": 12,
    "average_price": 2800
  },
  "message": "Estadísticas de inversores obtenidas exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener estadísticas de inversores",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estadísticas obtenidas exitosamente |
| 500 | Error interno del servidor |
