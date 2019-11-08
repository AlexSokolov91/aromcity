<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->registerPolicies($gate);
//        $gate->define('add-brands', function (\App\User $user) {
////            dd($user->roles);
//            foreach ($user->roles as $role) {
//                if ($role->name == 'Admin') {
//                    return true;
//                }
//            }
//            return false;
       // });
    }
}
//        Gate::define('update-brands', function (\App\User $user, $brands) {
//                foreach ($user->roles as $role)
//                {
//
//                    if($role->name == 'Admin') {
//                        if($user->id == $brands->user_id){
//                            return true;
//                        }
//                    }
//                }
//                return false;
//        });


