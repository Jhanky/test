# Endpoint: Estadísticas de Usuarios

## Descripción
Obtiene estadísticas generales sobre los usuarios registrados en el sistema.

## Detalles del Endpoint
- **URL**: `/api/users/statistics`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/users/statistics
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "statistics": {
      "total_users": 45,
      "active_users": 42,
      "inactive_users": 3,
      "users_by_role": {
        "Administrador": 3,
        "Gerente": 8,
        "Empleado": 34
      },
      "users_by_department": {
        "Ventas": 15,
        "Marketing": 12,
        "Tecnología": 10,
        "Recursos Humanos": 8
      },
      "recent_users": 5
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
- Las estadísticas incluyen el total de usuarios, activos e inactivos
- Se agrupan por roles y departamentos
- Se muestra la cantidad de usuarios registrados en los últimos 30 días
- Esta información es útil para dashboards y reportes administrativos
