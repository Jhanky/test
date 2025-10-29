# Endpoint: Opciones para Formularios de Clientes

## Descripción
Obtiene opciones predefinidas para usar en formularios de creación/edición de clientes, como tipos de documentos.

## Detalles del Endpoint
- **URL**: `/api/clients/options`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/clients/options
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "options": {
      "document_types": [
        {
          "value": "CC",
          "label": "Cédula de Ciudadanía"
        },
        {
          "value": "NIT",
          "label": "Número de Identificación Tributaria"
        },
        {
          "value": "CE",
          "label": "Cédula de Extranjería"
        },
        {
          "value": "PASS",
          "label": "Pasaporte"
        },
        {
          "value": "RUT",
          "label": "Registro Único Tributario"
        }
      ]
    }
  },
  "message": "Opciones obtenidas exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener opciones**
```json
{
  "success": false,
  "message": "Error al obtener opciones",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Devuelve listas predefinidas para campos de selección en formularios de clientes
- Incluye tipos de documentos comúnmente utilizados en Colombia
- Útil para mantener consistencia en los datos de clientes
- Se puede ampliar con más opciones según las necesidades del negocio
