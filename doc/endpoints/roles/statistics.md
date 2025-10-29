# Endpoint: Estadísticas de Roles

## Descripción
Obtiene estadísticas generales sobre los roles registrados en el sistema.

## Detalles del Endpoint
- **URL**: `/api/roles/statistics`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `roles.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/roles/statistics
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "statistics": {
      "total_roles": 3,
      "active_roles": 3,
      "inactive_roles": 0,
      "users_by_role": {
        "Administrador": 1,
        "Gerente": 5,
        "Empleado": 25
      }
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
- Las estadísticas incluyen el total de roles, activos e inactivos
- Se muestra la cantidad de usuarios asignados a cada rol
- Esta información es útil para dashboards y reportes administrativos
- Ayuda a identificar roles que podrían necesitar ajustes o eliminación
