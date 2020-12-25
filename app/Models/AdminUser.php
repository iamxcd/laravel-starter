<?php

namespace App\Models;

use App\Models\Traits\HasBaseConfig;
use App\Models\Traits\HasRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTimeInterface;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRole;

    protected $fillable = [
        'name',
        'username',
        'phone',
        'introduction',
        'avatar'
    ];

    protected $hidden = [
        'password'
    ];

    public static function booting()
    {
        static::creating(function ($user) {
            /**ss
             * 默认密码
             */
            $user->password = bcrypt(123456);
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
