<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupMenu extends Model
{
    protected $fillable = [
        'group_name',
        'group_icon',
        'is_sub_menu',
        'sl_order',
        'user_access',
        'status',
    ];

   
}
