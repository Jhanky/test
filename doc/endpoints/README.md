# Documentación de Endpoints de la API

## Autenticación
1. [Inicio de Sesión](auth/login.md) - `POST /api/auth/login`
2. [Cerrar Sesión](auth/logout.md) - `POST /api/auth/logout`
3. [Obtener Usuario Actual](auth/me.md) - `GET /api/auth/me`
4. [Verificar Token](auth/verify.md) - `GET /api/auth/verify`
5. [Registrar Nuevo Usuario](auth/register.md) - `POST /api/auth/register`

## Gestión de Usuarios
1. [Listar Usuarios](users/list.md) - `GET /api/users`
2. [Obtener Usuario Específico](users/show.md) - `GET /api/users/{id}`
3. [Crear Nuevo Usuario](users/create.md) - `POST /api/users`
4. [Actualizar Usuario](users/update.md) - `PUT /api/users/{id}`
5. [Eliminar Usuario](users/delete.md) - `DELETE /api/users/{id}`
6. [Cambiar Estado de Usuario](users/toggle-status.md) - `PATCH /api/users/{id}/toggle-status`
7. [Estadísticas de Usuarios](users/statistics.md) - `GET /api/users/statistics`
8. [Opciones para Formularios](users/options.md) - `GET /api/users/options`

---
## Gestión de Roles
1. [Listar Roles](roles/list.md) - `GET /api/roles`
2. [Obtener Rol Específico](roles/show.md) - `GET /api/roles/{id}`
3. [Crear Nuevo Rol](roles/create.md) - `POST /api/roles`
4. [Actualizar Rol](roles/update.md) - `PUT /api/roles/{id}`
5. [Eliminar Rol](roles/delete.md) - `DELETE /api/roles/{id}`
6. [Cambiar Estado de Rol](roles/toggle-status.md) - `PATCH /api/roles/{id}/toggle-status`
7. [Estadísticas de Roles](roles/statistics.md) - `GET /api/roles/statistics`
8. [Permisos Disponibles](roles/permissions.md) - `GET /api/roles/permissions`

---

## Gestión de Clientes
1. [Listar Clientes](clients/list.md) - `GET /api/clients`
2. [Obtener Cliente Específico](clients/show.md) - `GET /api/clients/{id}`
3. [Crear Nuevo Cliente](clients/create.md) - `POST /api/clients`
4. [Actualizar Cliente](clients/update.md) - `PUT /api/clients/{id}`
5. [Eliminar Cliente](clients/delete.md) - `DELETE /api/clients/{id}`
6. [Cambiar Estado de Cliente](clients/toggle-status.md) - `PATCH /api/clients/{id}/toggle-status`
7. [Estadísticas de Clientes](clients/statistics.md) - `GET /api/clients/statistics`
8. [Opciones para Formularios](clients/options.md) - `GET /api/clients/options`

---

## Gestión de Baterías
1. [Listar Baterías](batteries/list.md) - `GET /api/batteries`
2. [Obtener Batería Específica](batteries/show.md) - `GET /api/batteries/{id}`
3. [Crear Nueva Batería](batteries/create.md) - `POST /api/batteries`
4. [Actualizar Batería](batteries/update.md) - `PUT /api/batteries/{id}`
5. [Eliminar Batería](batteries/delete.md) - `DELETE /api/batteries/{id}`
6. [Cambiar Estado de Batería](batteries/toggle-status.md) - `PATCH /api/batteries/{id}/toggle-status`
7. [Estadísticas de Baterías](batteries/statistics.md) - `GET /api/batteries/statistics`

---

## Gestión de Inversores
1. [Listar Inversores](inverters/list.md) - `GET /api/inverters`
2. [Obtener Inversor Específico](inverters/show.md) - `GET /api/inverters/{id}`
3. [Crear Nuevo Inversor](inverters/create.md) - `POST /api/inverters`
4. [Actualizar Inversor](inverters/update.md) - `PUT /api/inverters/{id}`
5. [Eliminar Inversor](inverters/delete.md) - `DELETE /api/inverters/{id}`
6. [Cambiar Estado de Inversor](inverters/toggle-status.md) - `PATCH /api/inverters/{id}/toggle-status`
7. [Estadísticas de Inversores](inverters/statistics.md) - `GET /api/inverters/statistics`

---

## Gestión de Paneles
1. [Listar Paneles](panels/list.md) - `GET /api/panels`
2. [Obtener Panel Específico](panels/show.md) - `GET /api/panels/{id}`
3. [Crear Nuevo Panel](panels/create.md) - `POST /api/panels`
4. [Actualizar Panel](panels/update.md) - `PUT /api/panels/{id}`
5. [Eliminar Panel](panels/delete.md) - `DELETE /api/panels/{id}`
6. [Cambiar Estado de Panel](panels/toggle-status.md) - `PATCH /api/panels/{id}/toggle-status`
7. [Estadísticas de Paneles](panels/statistics.md) - `GET /api/panels/statistics`

---

## Gestión de Cotizaciones
1. [Listar Cotizaciones](quotations/list.md) - `GET /api/quotations`
2. [Obtener Cotización Específica](quotations/show.md) - `GET /api/quotations/{id}`
3. [Crear Nueva Cotización](quotations/create.md) - `POST /api/quotations`
4. [Actualizar Cotización](quotations/update.md) - `PUT /api/quotations/{id}`
5. [Eliminar Cotización](quotations/delete.md) - `DELETE /api/quotations/{id}`
6. [Actualizar Estado de Cotización](quotations/update-status.md) - `PATCH /api/quotations/{id}/status`
7. [Estadísticas de Cotizaciones](quotations/statistics.md) - `GET /api/quotations/statistics`
8. [Obtener Estados de Cotización](quotations/get-statuses.md) - `GET /api/quotations/statuses`
9. [Generar PDF de Cotización](quotations/generate-pdf.md) - `GET /api/quotations/{id}/pdf`
10. [Generar PDFKit de Cotización](quotations/generate-pdfkit.md) - `GET /api/quotations/{id}/pdfkit`

---

## Gestión de Estados de Cotización
1. [Listar Estados de Cotización](quotation-statuses/list.md) - `GET /api/quotation-statuses`
2. [Obtener Estado de Cotización Específico](quotation-statuses/show.md) - `GET /api/quotation-statuses/{id}`
3. [Crear Nuevo Estado de Cotización](quotation-statuses/create.md) - `POST /api/quotation-statuses`
4. [Actualizar Estado de Cotización](quotation-statuses/update.md) - `PUT /api/quotation-statuses/{id}`
5. [Eliminar Estado de Cotización](quotation-statuses/delete.md) - `DELETE /api/quotation-statuses/{id}`

---

## Próximamente
- Departamentos
- Ciudades

*Esta documentación está en constante actualización a medida que se verifican y documentan más endpoints.*
