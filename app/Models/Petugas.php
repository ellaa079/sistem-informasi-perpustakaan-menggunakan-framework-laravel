<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas';

    protected $primaryKey = 'kode_petugas';

    protected $fillable = [
        'kode_petugas', 'nama', 'jabatan', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
