<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenus extends Model
{

    protected $table = 'user_menus';

    use HasFactory;

    public function menu()
    {
        return $this->hasOne(Menus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
