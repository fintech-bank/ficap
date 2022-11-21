<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Customer\CustomerPretCaution;
use App\Notifications\ChangePasswordNotification;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                dd($request);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::loginView('auth.login');
        Fortify::authenticateUsing(function (Request $request) {
            $user = CustomerPretCaution::where('email', $request->get('email'))->first();

            if($user && \Hash::check($request->get('password'), $user->password)) {
                if($user->created_at == $user->updated_at) {
                    $user->updated(["password" => null]);
                    return redirect()->route('account.password')->with('info', "Veuillez changer le mot de passe d'accès");
                }

                return $user;
            }
            return $user;
        });
    }
}
