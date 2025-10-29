# Endpoint: Verificar Token

## Descripción
Permite verificar si un token de autenticación es válido y aún no ha expirado.

## Detalles del Endpoint
- **URL**: `/api/auth/verify`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada adicionales.

## Ejemplo de Solicitud
```http
GET /api/auth/verify
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
**Token válido**
```json
{
  "success": true,
  "message": "Token válido",
  "data": {
    "user": {
      "id": 1,
      "name": "Nombre del Usuario",
      "email": "usuario@energy4cero.com",
      "is_active": true
    }
  }
}
```

## Respuestas de Error

### Código: 401 Unauthorized
**Token inválido o expirado**
```json
{
  "success": false,
  "message": "Token inválido o expirado"
}
```

### Código: 500 Internal Server Error
**Error al verificar token**
```json
{
  "success": false,
  "message": "Error al verificar token",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Este endpoint requiere un token de autenticación válido en el header de autorización
- Es útil para validar si una sesión sigue activa antes de realizar operaciones sensibles
- Solo devuelve información básica del usuario, no incluye rol ni permisos detallados
- Puede ser usado para mantener sesiones activas en aplicaciones frontend
