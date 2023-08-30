<?php

namespace App\Providers;

use App\Models\Employe;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('patient',function(){
            $employer=Employe::with('role')->where('user_id',request()->user()->id)->first();
            if($employer->role->role=='Infermiere' || $employer->role->role=='Assistante' || $employer->role->role=='Admin' ){
                return true;
            }
            return false;
        });

        Gate::define('consultation',function(){
            $employer=Employe::with('role')->where('user_id',request()->user()->id)->first();
            if($employer->role->role=='Infermiere' || $employer->role->role=='Medecin'  || $employer->role->role=='Assistante' || $employer->role->role=='Admin' ){
                return true;
            }
            return false;
        });

        Gate::define('Admin',function(){
            $employer=Employe::with('role')->where('user_id',request()->user()->id)->first();
            if($employer->role->role=='Admin' ){
                return true;
            }
            return false;
        });






        Paginator::useBootstrap();
    }
}
