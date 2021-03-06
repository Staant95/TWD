<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Permission extends Model
{
    public $guarded = [];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
