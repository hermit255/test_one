<?php

namespace App\Providers;

use App\Repositories\TicketClass\TicketClassRepository;
use App\Repositories\TicketClass\EloquentTicketClassRepository;
use App\Repositories\TicketClass\FakeTicketClassRepository;
use App\Repositories\PublishedTicket\PublishedTicketRepository;
use App\Repositories\PublishedTicket\EloquentPublishedTicketRepository;
use App\Repositories\PublishedTicket\FakePublishedTicketRepository;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (\App::environment('test')) {
            $this->app->bind(TicketClassRepository::class, FakeTicketClassRepository::class);
            $this->app->bind(PublishedTicketRepository::class, FakePublishedTicketRepository::class);
        } else {
            $this->app->bind(TicketClassRepository::class, EloquentTicketClassRepository::class);
            $this->app->bind(PublishedTicketRepository::class, EloquentPublishedTicketRepository::class);
        }
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
