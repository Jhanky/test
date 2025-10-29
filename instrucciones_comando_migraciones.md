# Instrucciones para verificar y ejecutar migraciones de cotizaciones

## Comando personalizado

Se ha creado un comando Artisan personalizado para verificar y ejecutar las migraciones necesarias para las cotizaciones:

```
php artisan quotations:check-migrations
```

## ¿Qué hace este comando?

1. Verifica si existen las siguientes tablas en la base de datos:
   - `quotations`
   - `quotation_items`
   - `used_products`
   - `quotation_statuses`

2. Si todas las tablas existen, muestra un mensaje de confirmación.

3. Si alguna tabla no existe, ejecuta automáticamente las migraciones necesarias.

## Cómo usar el comando

### 1. Ejecutar el comando
```bash
php artisan quotations:check-migrations
```

### 2. El comando mostrará el estado de cada tabla y tomará las acciones necesarias

## Salida esperada

### Si todas las tablas existen:
```
Verificando migraciones de cotizaciones...
Tabla quotations existe: Sí
Tabla quotation_items existe: Sí
Tabla used_products existe: Sí
Tabla quotation_statuses existe: Sí
✅ Todas las tablas necesarias para las cotizaciones ya existen.
```

### Si faltan tablas:
```
Verificando migraciones de cotizaciones...
Tabla quotations existe: Sí
Tabla quotation_items existe: No
Tabla used_products existe: Sí
Tabla quotation_statuses existe: Sí
⚠️  Algunas tablas necesarias no existen. Ejecutando migraciones...
...
✅ Todas las tablas necesarias se han creado correctamente.
```

## Después de ejecutar el comando

Una vez que el comando se haya ejecutado correctamente, podrás usar el endpoint de creación de cotizaciones sin problemas.
