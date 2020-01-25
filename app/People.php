<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
     use SoftDeletes;
    protected $appends=['role'];

    public function getRoleAttribute(){
         $role =  Role::where('id',$this->job_role)->first();
        return $role->role_name??'';
    }
}




