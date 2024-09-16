<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class User extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    public function isAdmin()
    {
        // Здесь может быть ваша логика для определения, является ли пользователь администратором
        return $this->role === 'admin'; // Предположим, что у вас есть поле role
    }
}
