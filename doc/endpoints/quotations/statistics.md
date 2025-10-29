# Estadísticas de Cotizaciones

Obtiene estadísticas generales sobre las cotizaciones registradas en el sistema.

## Endpoint

```http
GET /api/quotations/statistics
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
    "sum_total_value": 125000000.00,
    "by_status": [
      {
        "status_id": 1,
        "name": "Borrador",
        "color": "#9E9E9E",
        "count": 8
      },
      {
        "status_id": 2,
        "name": "Enviada",
        "color": "#2196F3",
        "count": 10
      },
      {
        "status_id": 3,
        "name": "Revisada",
        "color": "#FF9800",
        "count": 4
      },
      {
        "status_id": 4,
        "name": "Negociación",
        "color": "#FFEB3B",
        "count": 2
      },
      {
        "status_id": 5,
        "name": "Contratada",
        "color": "#4CAF50",
        "count": 1
      }
    ],
    "by_system_type": [
      {
        "system_type": "On-grid",
        "count": 15
      },
      {
        "system_type": "Off-grid",
        "count": 5
      },
      {
        "system_type": "Híbrido",
        "count": 5
      }
    ]
  },
  "message": "Estadísticas de cotizaciones obtenidas exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener estadísticas de cotizaciones",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estadísticas obtenidas exitosamente |
| 500 | Error interno del servidor |
