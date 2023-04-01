<?php

declare(strict_types=1);

namespace App\Modules\Book\Contracts\Repositories;

use Illuminate\Support\Collection;

interface GetAllBooksRepository
{
    public function getAllBooks(): Collection;
}
