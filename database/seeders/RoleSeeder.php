<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'administrador',
                'description' => 'Acceso completo al sistema con todos los permisos',
                'permissions' => [
                    // Gestión de Usuarios
                    'users.create',
                    'users.read',
                    'users.update',
                    'users.delete',
                    
                    // Gestión de Roles
                    'roles.create',
                    'roles.read',
                    'roles.update',
                    'roles.delete',
                    
                    // Gestión de Proyectos
                    'projects.create',
                    'projects.read',
                    'projects.update',
                    'projects.delete',
                    
                    // Gestión Financiera
                    'financial.read',
                    'financial.update',
                    'financial.reports',
                    
                    // Gestión Comercial
                    'commercial.read',
                    'commercial.update',
                    'commercial.reports',
                    
                    // Gestión de Clientes
                    'clients.create',
                    'clients.read',
                    'clients.update',
                    'clients.delete',
                    
                    // Gestión de Cotizaciones
                    'quotations.create',
                    'quotations.read',
                    'quotations.update',
                    'quotations.delete',
                    
                    // Gestión de Suministros
                    'supplies.create',
                    'supplies.read',
                    'supplies.update',
                    'supplies.delete',
                    'supplies.reports',
                    
                    // Configuración del Sistema
                    'settings.read',
                    'settings.update',
                    
                    // Reportes y Análisis
                    'reports.create',
                    'reports.read',
                    'reports.update',
                    'reports.delete',
                    
                    // Soporte Técnico
                    'support.read',
                    'support.update',
                    'support.delete',
                    
                    // Gestión de Paneles
                    'panels.read',
                    'panels.create',
                    'panels.update',
                    'panels.delete',
                    
                    // Gestión de Inversores
                    'inverters.read',
                    'inverters.create',
                    'inverters.update',
                    'inverters.delete',
                    
                    // Gestión de Baterías
                    'batteries.read',
                    'batteries.create',
                    'batteries.update',
                    'batteries.delete',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Gerente',
                'slug' => 'gerente',
                'description' => 'Gestión general y supervisión de operaciones',
                'permissions' => [
                    // Gestión de Usuarios (solo lectura)
                    'users.read',
                    
                    // Gestión de Proyectos (completa)
                    'projects.create',
                    'projects.read',
                    'projects.update',
                    
                    // Gestión Financiera (solo lectura)
                    'financial.read',
                    'financial.reports',
                    
                    // Gestión Comercial (solo lectura)
                    'commercial.read',
                    
                    // Soporte Técnico
                    'support.read',
                    'support.update',
                    
                    // Reportes y Análisis
                    'reports.create',
                    'reports.read',
                    'reports.update',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Comercial',
                'slug' => 'comercial',
                'description' => 'Gestión comercial, clientes y cotizaciones',
                'permissions' => [
                    // Gestión Comercial (completa)
                    'commercial.read',
                    'commercial.update',
                    'commercial.reports',
                    
                    // Gestión de Proyectos (solo lectura)
                    'projects.read',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Contador',
                'slug' => 'contador',
                'description' => 'Gestión financiera y contable',
                'permissions' => [
                    // Gestión Financiera (completa)
                    'financial.read',
                    'financial.update',
                    'financial.reports',
                    
                    // Gestión de Proyectos (solo lectura)
                    'projects.read',
                    
                    // Reportes y Análisis (solo lectura)
                    'reports.read',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Ingeniero',
                'slug' => 'ingeniero',
                'description' => 'Gestión de proyectos técnicos e instalaciones',
                'permissions' => [
                    // Gestión de Proyectos (completa)
                    'projects.create',
                    'projects.read',
                    'projects.update',
                    
                    // Soporte Técnico
                    'support.read',
                    'support.update',
                ],
                'is_active' => true,
            ],
            [
                'name' => 'Técnico',
                'slug' => 'tecnico',
                'description' => 'Ejecución técnica y mantenimiento',
                'permissions' => [
                    // Gestión de Proyectos (solo lectura)
                    'projects.read',
                    
                    // Soporte Técnico (solo lectura)
                    'support.read',
                ],
                'is_active' => true,
            ],
        ];

        foreach ($roles as $roleData) {
            Role::create($roleData);
        }
    }
}