<?php

namespace App\Model;
use App\Model\GroupMenu;
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

    public function groupmenus(){
       return $this->belongsTo(GroupMenu::class);
    }
}
