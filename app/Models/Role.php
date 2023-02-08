<?php

namespace App\Models;

use App\Models\Permissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permissions', 'role_id', 'permissions_id');
    }

    // public static function boot() {
    //     parent::boot();

    //     static::deleting(function($role) { // before delete() method call this
    //          $role->permissions()->detach();
    //     });
    // }
}
