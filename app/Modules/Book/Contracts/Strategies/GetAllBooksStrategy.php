<?php

declare(strict_types=1);

namespace App\Modules\Book\Contracts\Strategies;

use Illuminate\Support\Collection;

interface GetAllBooksStrategy
{
    public function execute(): Collection;
}
