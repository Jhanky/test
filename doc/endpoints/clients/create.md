# Endpoint: Crear Nuevo Cliente

## Descripción
Crea un nuevo cliente en el sistema con los datos proporcionados.

## Detalles del Endpoint
- **URL**: `/api/clients`
- **Método**: `POST`
- **Autenticación requerida**: Sí (Bearer Token)
- **Permisos requeridos**: `commercial.update`

## Parámetros de Entrada

| Campo | Tipo | Requerido | Descripción |
|-------|------|-----------|-------------|
| name | string | Sí | Nombre completo del cliente |
| client_type | string | Sí | Tipo de cliente (residencial, comercial, empresa) |
| email | string | Sí | Correo electrónico único del cliente |
| phone | string | No | Número de teléfono del cliente |
| nic | string | No | Número de identificación del cliente |
| responsible_user_id | integer | No | ID del usuario responsable del cliente |
| department_id | integer | No | ID del departamento del cliente |
| city_id | integer | No | ID de la ciudad del cliente |
| address | string | No | Dirección del cliente |
| monthly_consumption | number | No | Consumo mensual del cliente |
| notes | string | No | Notas adicionales sobre el cliente |
| is_active | boolean | No | Estado del cliente (por defecto: true) |

## Ejemplo de Solicitud
```json
{
  "name": "María González",
  "client_type": "residencial",
  "email": "maria.gonzalez@email.com",
  "phone": "0987654321",
  "nic": "987654321",
  "responsible_user_id": 3,
  "department_id": 2,
  "city_id": 10,
  "address": "Carrera 45 #67-89",
  "monthly_consumption": 350.75,
  "notes": "Cliente nuevo con alto potencial",
  "is_active": true
}
```

## Respuestas Exitosas

### Código: 201 Created
```json
{
  "success": true,
  "data": {
    "client": {
      "client_id": 2,
      "name": "María González",
      "client_type": "residencial",
      "email": "maria.gonzalez@email.com",
      "phone": "0987654321",
      "nic": "987654321",
      "responsible_user_id": 3,
      "department_id": 2,
      "city_id": 10,
      "address": "Carrera 45 #67-89",
      "monthly_consumption": 350.75,
      "notes": "Cliente nuevo con alto potencial",
      "is_active": true,
      "created_at": "2025-10-27T12:00:00.000000Z",
      "updated_at": "2025-10-27T12:00:00.000000Z"
    }
  },
  "message": "Cliente creado exitosamente"
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
    "name": [
      "El nombre es obligatorio"
    ],
    "client_type": [
      "El tipo de cliente es obligatorio",
      "El tipo de cliente debe ser residencial, comercial o empresa"
    ],
    "email": [
      "El email es obligatorio",
      "El email debe tener un formato válido",
      "Este email ya está registrado"
    ],
    "responsible_user_id": [
      "El usuario responsable seleccionado no existe"
    ],
    "department_id": [
      "El departamento seleccionado no existe"
    ],
    "city_id": [
      "La ciudad seleccionada no existe"
    ],
    "nic": [
      "Este número de identificación ya está registrado"
    ]
  }
}
```

### Código: 500 Internal Server Error
**Error al crear cliente**
```json
{
  "success": false,
  "message": "Error al crear cliente",
  "error": "Mensaje de error detallado"
}
```

## Notas Adicionales
- El email y NIC del cliente deben ser únicos en el sistema
- Si no se proporciona un usuario responsable, se asigna automáticamente el usuario autenticado
- Los tipos de cliente válidos son: residencial, comercial, empresa
- Por defecto, los nuevos clientes se crean con estado activo
- El consumo mensual debe ser un valor numérico positivo
