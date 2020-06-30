<?php

namespace App;

use Caffeinated\Shinobi\Models\Role as RoleShinobi;
use App\Traits\DatesTranslator;

class Role extends RoleShinobi
{
	use DatesTranslator;
    public function scopeSearchByRoleName($query, $name)
    {
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }

    
}
