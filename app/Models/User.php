<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; 
use Spatie\Permission\Models\Role;// Importa el trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Usa el trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    protected $casts = [ // Cambié el método a una propiedad
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');

    }
    public function roles2()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

public function nominas()
    {
        return $this->hasMany(Nomina::class, 'usuario_id');
    }

}
