<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    use HasFactory;

    protected $table = 'my_list';

    protected $fillable = [
        'userID',
        'description',
        'activeStatus',
    ];
}
