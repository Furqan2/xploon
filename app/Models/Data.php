<?php

namespace App\Models;

use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    use UserTrait;
    protected $fillable = [
        'id',
        'lname',
        'fname',
        'email',
        'date'
    ];
}
