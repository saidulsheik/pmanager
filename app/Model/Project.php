<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'type_id',
        'status_id',
        'name',
        'description',
        'company_id', 
        'start_date', 
        'end_date',
        'progress',
        'user_id',
    ];

    public function company(){
        //return $this->belongsTo(Company::class);
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function project_types(){
    //     return $this->belongsTo(ProjectType::class);
    // }

    // public function project_statuses(){
    //     return $this->belongsTo(ProjectStatus::class);
    // }
}
