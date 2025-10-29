# Generar PDF de Cotización

Genera un PDF con la información detallada de una cotización específica.

## Endpoint

```http
GET /api/quotations/{id}/pdf
```

## Parámetros de la URL

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `id` | integer | ID de la cotización para generar el PDF |

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
    "pdf_data": {
      "quotation_number": "COT-000002",
      "project_name": "Proyecto Comercial Solar",
      "client_name": "Empresa S.A.",
      "client_email": "contacto@empresasolar.com",
      "client_phone": "3009876543",
      "total_value": 15723600.00,
      "status": "Borrador",
      "created_at": "27/10/2025",
      "system_type": "Híbrido",
      "power_kwp": 15.75,
      "panel_count": 40,
      "items": [
        {
          "description": "Instalación de sistema fotovoltaico",
          "quantity": 1.00,
          "unit_price": 2500000.00,
          "total_value": 2500000.00
        }
      ],
      "used_products": [
        {
          "product_type": "panel",
          "quantity": 40,
          "unit_price": 150000.00,
          "total_value": 6000000.00
        },
        {
          "product_type": "inverter",
          "quantity": 2,
          "unit_price": 1250000.00,
          "total_value": 2500000.00
        }
      ]
    },
    "url": "/pdfs/cotizacion_2.pdf",
    "filename": "cotizacion_COT-000002.pdf"
  },
  "message": "PDF generado exitosamente"
}
```

## Respuesta de Error

```json
{
  "success": false,
  "message": "Cotización no encontrada",
  "error": "No query results for model [App\\Models\\Quotation] 999"
}
```

## Códigos de Estado

| Código | Descripción |
|--------|-------------|
| 200 | PDF generado exitosamente |
| 404 | Cotización no encontrada |
| 500 | Error interno del servidor |
