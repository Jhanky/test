# Actualizar Estado de Cotización

Actualiza el estado de una cotización existente. Si el estado cambia a "Contratada" (ID 5), se crea automáticamente un proyecto.

## Endpoint

```http
PATCH /api/quotations/{id}/status
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la cotización a actualizar |

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: application/json
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `status_id` | integer | Sí | ID del nuevo estado |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "quotation_id": 2,
    "status": {
      "status_id": 5,
      "name": "Contratada",
      "description": "Cotización aceptada por el cliente",
      "color": "#4CAF50"
    },
    "updated_at": "2025-10-27T16:45:00.000000Z",
    "project_created": {
      "project_id": 1,
      "project_name": "Proyecto Comercial Solar",
      "status": "Activo"
    }
  },
  "message": "Estado de cotización actualizado exitosamente y proyecto creado automáticamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "status_id": [
      "El campo status id es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al actualizar estado de cotización",
  "error": "No query results for model [App\\Models\\Quotation] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | Estado de cotización actualizado exitosamente |
| 404 | Cotización no encontrada |
| 422 | Error de validación |
| 500 | Error interno del servidor |
