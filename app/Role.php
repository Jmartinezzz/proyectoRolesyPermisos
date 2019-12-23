<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Models\Role as RoleShinobi;

class Role extends RoleShinobi
{
    public function scopeSearchByRoleName($query, $name)
    {
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }

    
}
