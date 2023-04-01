<?php

declare(strict_types=1);

namespace App\Modules\Book\Contracts\Services;

use Illuminate\Support\Collection;

interface BookService
{
    public function getAllBooks(): Collection;
}
