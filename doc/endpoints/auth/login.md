# Endpoint: Inicio de Sesión

## Descripción
Permite a los usuarios autenticarse en el sistema utilizando sus credenciales corporativas.

## Detalles del Endpoint
- **URL**: `/api/auth/login`
- **Método**: `POST`
- **Autenticación requerida**: No

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| email | string | Sí | Correo electrónico del usuario (debe pertenecer al dominio @energy4cero.com) |
| password | string | Sí | Contraseña del usuario (mínimo 6 caracteres) |

## Ejemplo de Solicitud
```json
{
  "email": "usuario@energy4cero.com",
  "password": "contraseña123"
}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "message": "Inicio de sesión exitoso",
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
    },
    "token": "1|abcdefghijk1234567890",
    "token_type": "Bearer"
  }
}
```

## Respuestas de Error

### Código: 422 Unprocessable Entity
**Datos de entrada inválidos**
```json
{
  "success": false,
  "message": "Datos de entrada inválidos",
  "errors": {
    "email": [
      "El email es obligatorio",
      "El email debe tener un formato válido",
      "Solo se permiten usuarios con dominio @energy4cero.com"
    ],
    "password": [
      "La contraseña es obligatoria",
      "La contraseña debe tener al menos 6 caracteres"
    ]
  }
}
```

### Código: 401 Unauthorized
**Credenciales incorrectas**
```json
{
  "success": false,
  "message": "Credenciales incorrectas"
}
```

### Código: 500 Internal Server Error
**Error interno del servidor**
```json
{
  "success": false,
  "message": "Error interno del servidor",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- Solo se permiten usuarios con correo electrónico del dominio @energy4cero.com
- La contraseña debe tener al menos 6 caracteres
- El token devuelto debe ser usado en las cabeceras de autorización para los endpoints protegidos
- El token debe enviarse en el header como: `Authorization: Bearer {token}`
