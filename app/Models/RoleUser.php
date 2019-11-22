<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 20.11.2019
 * Time: 11:11
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class RoleUser extends Model
{
    protected $fillable = [
       'role_id'
    ];
    public $primaryKey = 'user_id';
    public function user()
    {
        return $this->belongTo(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}