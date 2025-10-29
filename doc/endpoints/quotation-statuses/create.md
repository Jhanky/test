# Crear Estado de Cotización

Crea un nuevo estado de cotización en el sistema.

## Endpoint

```http
POST /api/quotation-statuses
```

## Encabezados

```http
Authorization: Bearer <token>
Accept: application/json
Content-Type: application/json
```

## Parámetros

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| `name` | string | Sí | Nombre único del estado |
| `description` | string | No | Descripción del estado (máx. 255 caracteres) |
| `color` | string | No | Color hexadecimal para identificar visualmente el estado (máx. 20 caracteres) |
| `is_active` | boolean | No | Si el estado está activo (por defecto: true) |

## Respuesta Exitosa

```json
{
  "success": true,
  "data": {
    "status_id": 6,
    "name": "Cancelada",
    "description": "Cotización cancelada por el cliente",
    "color": "#F44336",
    "is_active": true,
    "created_at": "2025-10-27T17:30:00.000000Z",
    "updated_at": "2025-10-27T17:30:00.000000Z"
  },
  "message": "Estado de cotización creado exitosamente"
}
```

## Respuesta de Error de Validación

```json
{
  "success": false,
  "message": "Error de validación",
  "errors": {
    "name": [
      "El campo name es obligatorio."
    ]
  }
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Error al crear estado de cotización",
  "error": "Mensaje de error detallado"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 201 | Estado de cotización creado exitosamente |
| 422 | Error de validación |
| 500 | Error interno del servidor |
