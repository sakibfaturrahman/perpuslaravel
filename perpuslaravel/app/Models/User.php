<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'alamat',

    ];

    protected $attributes = [
        'role_id' => 2
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
