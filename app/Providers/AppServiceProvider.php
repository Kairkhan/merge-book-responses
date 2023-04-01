<?php

namespace App\Providers;

use App\Modules\Book\DTO\Book;
use App\Modules\Book\Services\BookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->tag(Book::getStrategies(), 'strategies');

        $this->app->when(BookService::class)
            ->needs('$strategies')
            ->giveTagged('strategies');

        $this->app->bind(\App\Modules\Book\Contracts\Services\BookService::class, BookService::class);
    }
}
