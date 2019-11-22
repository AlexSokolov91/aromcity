<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =
        [
            'name', 'permissions',
        ];
        public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
//    public function hasAccess(array $permissions) : bool
//    {
//        foreach ($permissions as $permission){
//            if($this->hasPermission($permission))
//                return true;
//        }
//        return false;
//    }
//    private function hasPermission(string $permission) : bool
//    {
//        return $this->permissions[$permission] ?? false;
//    }

    public function role_user()
    {
        return $this->hasOne(RoleUser::class);
    }
}
