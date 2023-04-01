<?php

declare(strict_types=1);

namespace App\Modules\Book\Strategies;

use App\Modules\Book\Contracts\Strategies\GetAllBooksStrategy;
use App\Modules\Book\DTO\Book;
use App\Modules\Book\Exceptions\FetchingBooksFailedException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

final class FirstBookStoreStrategy implements GetAllBooksStrategy
{
    /**
     * @throws FetchingBooksFailedException
     */
    public function execute(): Collection
    {
        $response = Http::get("/whatever", []);;

        if ($response->failed()) {
            throw new FetchingBooksFailedException("Не удалось получить данные!");
        }

        return Collection::make($response->json()['data'])
            ->map(fn(array $data) => Book::fromFirstBookStore($data));
    }
}
