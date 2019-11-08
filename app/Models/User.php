<?php

namespace App;

use App\Models\Role;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password'
        ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
//    public function  isEmployee()
//    {
//        $roles = $this->roles->toArray();
//        return !empty($roles);
//    }

//    public function hasRole($check)
//    {
//        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
//    }

//    private function getIdInArray($array, $term)
//    {
//        foreach ($array as $key => $value) {
//            if($value == $term){
//                return $key +1;
//            }
//        }
//        return false;
//    }
//       public function makeEmployee($title)
//       {
//           $assigned_roles = array();
//           $roles = array_fetch(Role::all()->toArray(), 'name');
//           switch ($title) {
//               case 'super_admin':
//                   $assigned_roles[] = $this->getIdInArray($roles, 'admin');
//               case 'admin':
//                   $assigned_roles[] = $this->getIdInArray($roles, 'admin');
//               case 'reader':
//                   $assigned_roles[] = $this->getIdInArray($roles, 'reader');
//                break;
//               default:
//                   $assigned_roles[] = false;
//           }
//           $this->roles()->attach($assigned_roles);
//       }

    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}

