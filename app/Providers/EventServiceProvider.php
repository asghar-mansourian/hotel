<?php

namespace App\Providers;

use App\Events\OrderStatusChanged;
use App\Listeners\SendEmailOrderStatusNotification;
use App\Listeners\SendFirebaseOrderStatusNotification;
use App\Listeners\SendSmsOrderStatusNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderStatusChanged::class => [
            SendSmsOrderStatusNotification::class,
            SendEmailOrderStatusNotification::class,
            SendFirebaseOrderStatusNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
