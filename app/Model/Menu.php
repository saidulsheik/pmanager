<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'group_menus_id',
        'menu_name',
        'user_access',
        'menu_action',
        'sl_order',
    ];

    public function group_menus(){
       return $this->belongsTo(GroupMenu::class);
    }

    public function roles(){
        return $this->hasMany(Role::Class);
    }
}
