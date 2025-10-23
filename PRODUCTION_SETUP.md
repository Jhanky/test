# Production Environment Configuration

This file documents the necessary environment variables needed for the production deployment.

## Important Environment Variables for Production

The following environment variables should be set in your production environment:

### Laravel Sanctum Configuration
```
SANCTUM_STATEFUL_DOMAINS=www.apitest.energy4cero.com,apitest.energy4cero.com,localhost:3000,localhost:5173,localhost:4173,127.0.0.1:3000,127.0.0.1:5173,127.0.0.1:4173,enterprise.energy4cero.com
```

### Application URL
```
APP_URL=https://www.apitest.energy4cero.com
```

### CORS Configuration
The CORS configuration has been updated to work properly in production. The config/cors.php file now includes the APP_URL in allowed origins and supports local development domains and the deployed frontend domain.

## Environment File Example

For production deployment, your .env file should look similar to this:

```
APP_NAME=Api
APP_ENV=production
APP_KEY=base64:oxvjizO/2vaL7AaDmt6J5LoNWcWmHGCDj8e+EIGduPs=
APP_DEBUG=false
APP_URL=https://www.apitest.energy4cero.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion
DB_USERNAME=jhanky
DB_PASSWORD=Jh@nky007

# Configuración importante para CORS y Sanctum
SANCTUM_STATEFUL_DOMAINS=www.apitest.energy4cero.com,apitest.energy4cero.com,localhost:3000,localhost:5173,localhost:4173,127.0.0.1:3000,127.0.0.1:5173,127.0.0.1:4173

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

## Backend Deployment Notes

- The backend API endpoints are available at https://www.apitest.energy4cero.com/public/api
- Laravel Sanctum is used for authentication 
- Make sure to run the following commands after deployment:
  - php artisan config:cache
  - php artisan route:cache
  - php artisan optimize:clear

## Frontend Configuration

- The frontend should be configured with the API URL: https://www.apitest.energy4cero.com/public/api
- The build is already configured with the correct API URL