<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Sms\SmsInterface;
use App\Sms\TwilioSms;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioSms::class, function () {

            $config = config('services.twilio');
 
            return new TwilioSms($config['account_sid'], $config['auth_token']);
 
        });
 
        $this->app->bind(SmsInterface::class, TwilioSms::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
