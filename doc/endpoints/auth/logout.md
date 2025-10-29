# Endpoint: Cerrar Sesión

## Descripción
Permite a los usuarios cerrar su sesión actual, revocando el token de autenticación.

## Detalles del Endpoint
- **URL**: `/api/auth/logout`
- **Método**: `POST`
- **Autenticación requerida**: Sí (Bearer Token)

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada adicionales.

## Ejemplo de Solicitud
```http
POST /api/auth/logout
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Sesión cerrada exitosamente"
}
```

## Respuestas de Error

### Código: 500 Internal Server Error
**Error al cerrar sesión**
```json
{
  "success": false,
  "message": "Error al cerrar sesión",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Este endpoint requiere un token de autenticación válido en el header de autorización
- Al ejecutar este endpoint, el token actual se revoca y ya no puede ser usado
- Es importante llamar a este endpoint cuando el usuario desea cerrar sesión de forma segura
