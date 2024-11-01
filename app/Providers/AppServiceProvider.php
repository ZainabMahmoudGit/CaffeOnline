<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Websiteinfos;
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
        Gate::define("is-admin", function(User $user){
            return $user->role == "admin";
        });
        // gate inst
        Gate::define("is-user", function(User $user){
            return $user->role == "user";
        });
        View::composer('*', function ($view) {
            // جلب أول سجل من جدول Websiteinfos
            $websiteinfos = Websiteinfos::first();
            
            // تمرير البيانات إلى جميع الـ views فقط إذا كانت البيانات موجودة
            if ($websiteinfos) {
                $view->with('websiteinfos', $websiteinfos);
            } else {
                // إذا لم تكن هناك بيانات، مرر قيمة فارغة أو رسالة بديلة
                $view->with('websiteinfos', (object) [
                    'WebsiteEmail' => 'No Email Available',
                    'WebsitePhone' => 'No Phone Available',
                ]);
            }
           
            
        });
    }
}
