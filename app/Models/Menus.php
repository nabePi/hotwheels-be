<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

    protected $table = 'menus';

    use HasFactory;

    public function user_menus()
    {
        return $this->belongsTo(UserMenus::class);
    }
}
