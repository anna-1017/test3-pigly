<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PiglyUser;        


class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        

        Fortify::registerview(function(){
            return view('auth.register');
        });

        Fortify::loginview(function(){
            return view('auth.login');
        });


        Fortify::authenticateUsing(function   (\Laravel\Fortify\Http\Requests\LoginRequest $request) {
            $user = PiglyUser::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });


        RateLimiter::for('login', function(Request $request){
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        $this->app->bind(FortifyLoginRequest::class, LoginRequest::class);

        
    
    }
}
