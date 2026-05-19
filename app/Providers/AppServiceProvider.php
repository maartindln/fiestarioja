<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

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
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = url('/password/reset/'.$token.'?email='.urlencode($notifiable->getEmailForPasswordReset()));

            return (new MailMessage)
                ->subject('Restablecer contraseña - FiestaRioja')
                ->view('mails.resetPassword', ['actionUrl' => $url]);
        });
    }
}
