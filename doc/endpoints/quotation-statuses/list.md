# Listar Estados de Cotización

Obtiene una lista de todos los estados de cotización disponibles en el sistema.

## Endpoint

```http
GET /api/quotation-statuses
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
  "data": [
    {
      "status_id": 1,
      "name": "Borrador",
      "description": "Cotización en elaboración",
      "color": "#9E9E9E",
      "is_active": true,
      "created_at": "2025-10-22T12:00:00.000000Z",
      "updated_at": "2025-10-22T12:00:00.000000Z"
    },
    {
      "status_id": 2,
      "name": "Enviada",
      "description": "Cotización enviada al cliente",
      "color": "#2196F3",
      "is_active": true,
      "created_at": "2025-10-22T12:00:00.000000Z",
      "updated_at": "2025-10-22T12:00:00.000000Z"
    },
    {
      "status_id": 3,
      "name": "Revisada",
      "description": "Cotización revisada por el cliente",
      "color": "#FF9800",
      "is_active": true,
      "created_at": "2025-10-22T12:00:00.000000Z",
      "updated_at": "2025-10-22T12:00:00.000000Z"
    },
    {
      "status_id": 4,
      "name": "Negociación",
      "description": "En proceso de negociación",
      "color": "#FFEB3B",
      "is_active": true,
      "created_at": "2025-10-22T12:00:00.000000Z",
      "updated_at": "2025-10-22T12:00:00.000000Z"
    },
    {
      "status_id": 5,
      "name": "Contratada",
      "description": "Cotización aceptada por el cliente",
      "color": "#4CAF50",
      "is_active": true,
      "created_at": "2025-10-22T12:00:00.000000Z",
      "updated_at": "2025-10-22T12:00:00.000000Z"
    }
  ],
  "message": "Estados de cotización obtenidos exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al obtener estados de cotización",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estados de cotización obtenidos exitosamente |
| 500 | Error interno del servidor |
