<?php

namespace App;

use Caffeinated\Shinobi\Models\Permission as PermissionShinobi;
use App\Traits\DatesTranslator;

class Permission extends PermissionShinobi
{
    use DatesTranslator;
    public function scopeSearchByPermissionName($query, $name)
    {
        if ($name) {
            return $query->where('name','LIKE',"%$name%");
        }
    }
}
