<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupMenu extends Model
{
    protected $guarded = [];

    public function menu(){
        return $this->belongsTo(Menu::class);
     }
}
