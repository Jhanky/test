# Solución al problema de la tabla 'quotation_items' faltante

## Problema
El error indica que la tabla 'gestion.quotation_items' no existe:
```
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'gestion.quotation_items' doesn't exist
```

## Causa
Las migraciones de la base de datos no se han ejecutado correctamente, por lo que la tabla `quotation_items` no existe en la base de datos.

## Solución

### 1. Verificar el estado actual de las migraciones
```bash
php artisan migrate:status
```

### 2. Ejecutar todas las migraciones pendientes
```bash
php artisan migrate
```

### 3. Si hay problemas con migraciones anteriores, puedes hacer un fresh (¡CUIDADO! Esto eliminará todos los datos)
```bash
php artisan migrate:fresh
```

### 4. O si prefieres resetear y volver a migrar (¡CUIDADO! Esto también eliminará todos los datos)
```bash
php artisan migrate:reset
php artisan migrate
```

## Verificación
Después de ejecutar las migraciones, verifica que la tabla exista:

1. Conecta a tu base de datos MySQL
2. Ejecuta:
```sql
SHOW TABLES LIKE 'quotation_items';
```

3. También puedes verificar la estructura de la tabla:
```sql
DESCRIBE quotation_items;
```

## Notas importantes
- Asegúrate de tener una copia de seguridad de tus datos antes de ejecutar `migrate:fresh` o `migrate:reset`
- Si estás en un entorno de producción, nunca uses `migrate:fresh` o `migrate:reset`
- Verifica que el archivo `.env` tenga la configuración correcta de la base de datos
