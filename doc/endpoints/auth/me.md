# Endpoint: Obtener Usuario Actual

## Descripción
Permite obtener la información del usuario autenticado actualmente en el sistema.

## Detalles del Endpoint
- **URL**: `/api/auth/me`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada adicionales.

## Ejemplo de Solicitud
```http
GET /api/auth/me
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Usuario obtenido exitosamente",
  "data": {
    "user": {
      "id": 1,
      "name": "Nombre del Usuario",
      "email": "usuario@energy4cero.com",
      "phone": "1234567890",
      "department": "Departamento",
      "position": "Posición",
      "is_active": true,
      "role": {
        "id": 1,
        "name": "Nombre del Rol",
        "slug": "nombre-del-rol",
        "description": "Descripción del rol",
        "permissions": ["permiso1", "permiso2"],
        "is_active": true
      },
      "permissions": ["permiso1", "permiso2"]
    }
  }
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al obtener usuario**
```json
{
  "success": false,
  "message": "Error al obtener usuario",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Este endpoint requiere un token de autenticación válido en el header de autorización
- Devuelve la información completa del usuario autenticado, incluyendo su rol y permisos
- Es útil para mostrar la información del perfil del usuario en la interfaz de la aplicación
