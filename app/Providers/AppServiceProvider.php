<?php

namespace App\Providers;

use App\Models\Customer\CustomerPretCaution;
use Illuminate\Support\ServiceProvider;
use Spatie\Onboard\Facades\Onboard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Onboard::addStep('Définir le nouveau mot de passe')
            ->link('/account')
            ->cta("OK")
            ->completeIf(function (CustomerPretCaution $user) {
                if($user->created_at != $user->updated_at) {
                    return $user;
                }
            });

        Onboard::addStep("Signer l'acte de cautionnement")
            ->link('/caution')
            ->cta("OK")
            ->completeIf(function (CustomerPretCaution $user) {
                if($user->sign_caution && $user->signed_at != null) {
                    return $user;
                }
            });
    }
}
