# Endpoint: Opciones para Formularios de Usuarios

## Descripción
Obtiene opciones predefinidas para usar en formularios de creación/edición de usuarios, como listas de roles, departamentos y posiciones.

## Detalles del Endpoint
- **URL**: `/api/users/options`
- **Método**: `GET`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `users.read`

## Parámetros de Entrada
Este endpoint no requiere parámetros de entrada.

## Ejemplo de Solicitud
```http
GET /api/users/options
Authorization: Bearer {token}
```

## Respuestas Exitosas

### Código: 200 OK
```json
{
  "success": true,
  "data": {
    "options": {
      "roles": [
        {
          "id": 1,
          "name": "Administrador",
          "slug": "admin"
        },
        {
          "id": 2,
          "name": "Gerente",
          "slug": "manager"
        },
        {
          "id": 3,
          "name": "Empleado",
          "slug": "employee"
        }
      ],
      "departments": [
        "Ventas",
        "Marketing",
        "Tecnología",
        "Recursos Humanos",
        "Finanzas"
      ],
      "positions": [
        "Gerente General",
        "Gerente de Área",
        "Supervisor",
        "Especialista",
        "Asistente"
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
- Devuelve listas predefinidas para campos de selección en formularios
- Incluye roles activos, departamentos existentes y posiciones utilizadas
- Útil para mantener consistencia en los datos de usuarios
- Se actualiza automáticamente con los datos existentes en la base de datos
