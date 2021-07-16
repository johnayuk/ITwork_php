<?php

namespace App\Contracts;

use App\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Contracts\TicketInterface;
use App\Controllers\ContactController;
use App\Controllers\NewsController;
use App\Repositories\ContactRepository;
use App\Repositories\NewsRepository;
use App\Repositories\TicketRepository;

class TicketsServiceProvider extends ServiceProvider
{

    public function register()
    {

        // $this->app->bind(
        //     // 'App\Contracts\TicketInterface',
        //     // 'App\Repositories\NewsRepository',
        //       'App\Contracts\TicketInterface',
        //     //    'App\Repositories\NewsRepository',
        //         'App\Repositories\TicketRepository',
            
        // );

        // $this->app->bind(
        //     'App\Contracts\TicketInterface',
        //     'App\Repositories\TicketRepository'
        // );

        $this->app->when(TicketController::class)
        ->needs(TicketInterface::class)
        ->give(function () {
            return new TicketRepository;
        });

        $this->app->when(NewsController::class)
        ->needs(TicketInterface::class)
        ->give(function () {
            return new NewsRepository;
        });


        $this->app->when(ContactController::class)
        ->needs(TicketInterface::class)
        ->give(function () {
            return new ContactRepository;
        });
    }

}
