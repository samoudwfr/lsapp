<?php

namespace App\Providers;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewCustomerHasRegisteredEvent::class => [
            \App\Listeners\WelcomeNewCustomerListener::class,
            \App\Listeners\RegisterCustomerToNwesletter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ],
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
