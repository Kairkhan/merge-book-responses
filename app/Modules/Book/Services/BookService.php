<?php

declare(strict_types=1);

namespace App\Modules\Book\Services;

use App\Modules\Book\Contracts\Strategies\GetAllBooksStrategy;
use Illuminate\Support\Collection;
use App\Modules\Book\Contracts\Services\BookService as BookServiceContract;

final class BookService implements BookServiceContract
{
    public function __construct(
        private readonly array $strategies,
    ) {
    }

    public function getAllBooks(): Collection
    {
        $result = Collection::make();

        Collection::make($this->strategies)
            ->each(function(GetAllBooksStrategy $bookStrategy) use ($result){
                $result->merge($bookStrategy->execute());
            });

        return $result;
    }
}
