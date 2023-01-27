<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->greeting(Lang::get("Hi!"))
                ->subject(Lang::get("Verify Your Email Address"))
                ->line(Lang::get("You're almost ready to get started. Please click on the button below to verify your email address and start creating and joining events with us!"))
                ->action(Lang::get("Verify Email Address"), $url);
        });

        ResetPassword::toMailUsing(function ($notifiable,$token) {
            $url = route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ]);
            return (new MailMessage)
                ->greeting(Lang::get("Hi!"))
                ->subject(Lang::get('Forget Your Password?'))
                ->line(Lang::get("That's okay, it happens!."))
                ->line(Lang::get("Click on the button below to reset your password"))
                ->action(Lang::get("Reset your password"), $url);
        });

        //
    }
}
