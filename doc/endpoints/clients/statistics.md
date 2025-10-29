# Endpoint: Estadísticas de Clientes

## Descripción
Obtiene estadísticas generales sobre los clientes registrados en el sistema.

## Detalles del Endpoint
- **URL**: `/api/clients/statistics`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/clients/statistics
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "statistics": {
      "total_clients": 125,
      "active_clients": 110,
      "inactive_clients": 15,
      "by_company": [
        "Empresa A",
        "Empresa B",
        "Empresa C"
      ],
      "recent_clients": 8
    }
  },
  "message": "Estadísticas obtenidas exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener estadísticas**
```json
{
  "success": false,
  "message": "Error al obtener estadísticas",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Las estadísticas incluyen el total de clientes, activos e inactivos
- Se muestra la cantidad de clientes registrados en los últimos 30 días
- Se listan las empresas registradas en el sistema
- Esta información es útil para dashboards y reportes comerciales
