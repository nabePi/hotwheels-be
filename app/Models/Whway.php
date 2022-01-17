<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whway extends Model
{

    protected $table = 'whway_data';

    use HasFactory;

    protected $fillable = [
        'child_name',
        'parent_name',
        'phone_number',
        'email',
        'instagram',
        'image'
    ];
}
