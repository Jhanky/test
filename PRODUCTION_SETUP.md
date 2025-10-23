# Production Environment Configuration

This file documents the necessary environment variables needed for the production deployment.

## Important Environment Variables for Production

The following environment variables should be set in your production environment:

### Laravel Sanctum Configuration
```
SANCTUM_STATEFUL_DOMAINS=www.apitest.energy4cero.com,apitest.energy4cero.com
```

### Application URL
```
APP_URL=https://www.apitest.energy4cero.com
```

### CORS Configuration
The CORS configuration has been updated to work properly in production. The config/cors.php file now includes the APP_URL in allowed origins.

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