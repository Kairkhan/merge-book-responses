<?php

declare(strict_types=1);

namespace App\Modules\Book\Services;

use Illuminate\Support\Collection;
use App\Modules\Book\Contracts\Services\BookService as BookServiceContract;

final class BookService implements BookServiceContract
{
    public function getAllBooks(): Collection
    {
        return Collection::make();
    }
}
