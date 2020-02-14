<?php

namespace App\Providers;

use App\models\staff\role;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('edit-profile',function($users){
            return $users->level != 0;
        });

        // if (! $this->app->runningInConsole()) {
        //     // foreach (role::all() as $permission) {
        //     //     Gate::define($permission->name, function($user) use ($permission){
        //     //         foreach ($user->pesmissionstaff as $value) 
        //     //         {  
        //     //             return $value->name == $permission->name;
        //     //         }
        //     //     });
        //     // 
        // }

        // Gate::define('principal', function($user){
        //     return true;
        // });
        //  Gate::define('principal', function($user){
        //     return true;
        // });
    }
}
