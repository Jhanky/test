<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
        'phone',
        'department',
        'position',
        'role_id',
        'is_active',
=======
>>>>>>> 04748d080f58e1f195a4a62c28abf35718b01e1d
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
<<<<<<< HEAD
        'is_active' => 'boolean',
    ];

    /**
     * Relación con el rol del usuario
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Verificar si el usuario tiene un permiso específico
     */
    public function hasPermission($permission)
    {
        if (!$this->role) {
            return false;
        }

        $permissions = $this->role->permissions ?? [];
        return in_array($permission, $permissions);
    }

    /**
     * Verificar si el usuario tiene un rol específico
     */
    public function hasRole($roleSlug)
    {
        return $this->role && $this->role->slug === $roleSlug;
    }

    /**
     * Obtener todos los permisos del usuario
     */
    public function getAllPermissions()
    {
        return $this->role ? $this->role->permissions : [];
    }
=======
    ];
>>>>>>> 04748d080f58e1f195a4a62c28abf35718b01e1d
}
