<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;

    protected $table = 'users_lists';

    protected $fillable = [
        'name',
        'username',
        'password',
    ];
}
