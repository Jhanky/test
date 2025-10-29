# Actualizar Estado de Cotización

Actualiza la información de un estado de cotización existente.

## Endpoint

```http
PUT /api/quotation-statuses/{id}
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID del estado de cotización a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: application/json
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `name` | string | No | Nombre único del estado |
| `description` | string | No | Descripción del estado (máx. 255 caracteres) |
| `color` | string | No | Color hexadecimal para identificar visualmente el estado (máx. 20 caracteres) |
| `is_active` | boolean | No | Si el estado está activo |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "status_id": 3,
    "name": "Revisada por Ingeniería",
    "description": "Cotización revisada por el departamento de ingeniería",
    "color": "#FF5722",
    "is_active": true,
    "created_at": "2025-10-22T12:00:00.000000Z",
    "updated_at": "2025-10-27T18:45:00.000000Z"
  },
  "message": "Estado de cotización actualizado exitosamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "name": [
      "El campo name ya ha sido tomado."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al actualizar estado de cotización",
  "error": "No query results for model [App\\Models\\QuotationStatus] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estado de cotización actualizado exitosamente |
| 404 | Estado de cotización no encontrado |
| 422 | Error de validación |
| 500 | Error interno del servidor |
