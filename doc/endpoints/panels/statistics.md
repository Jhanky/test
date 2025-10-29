# Estadísticas de Paneles

Obtiene estadísticas generales sobre los paneles registrados en el sistema.

## Endpoint

```http
GET /api/panels/statistics
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
    "total": 25,
    "average_price": 160
  },
  "message": "Estadísticas de paneles obtenidas exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener estadísticas de paneles",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estadísticas obtenidas exitosamente |
| 500 | Error interno del servidor |
