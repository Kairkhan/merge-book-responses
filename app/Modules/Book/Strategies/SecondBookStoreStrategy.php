<?php

declare(strict_types=1);

namespace App\Modules\Book\Strategies;

use App\Modules\Book\Contracts\Strategies\GetAllBooksStrategy;
use App\Modules\Book\DTO\Book;
use App\Modules\Book\Exceptions\FetchingBooksFailedException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class SecondBookStoreStrategy implements GetAllBooksStrategy
{
    /**
     * @throws FetchingBooksFailedException
     */
    public function execute(): Collection
    {
        $response = Http::get("/another-whatever", []);

        if ($response->failed()) {
            throw new FetchingBooksFailedException("Не удалось получить данные!");
        }

        return Collection::make($response->json())
            ->map(fn(array $data) => Book::fromSecondBookStore($data));
    }
}
