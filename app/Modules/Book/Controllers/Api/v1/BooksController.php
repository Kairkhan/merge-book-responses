<?php

declare(strict_types=1);

namespace App\Modules\Book\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Modules\Book\Contracts\Services\BookService;
use App\Modules\Book\Resources\BookResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class BooksController extends Controller
{
    public function __construct(
      private readonly BookService $service
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        return BookResource::collection($this->service->getAllBooks());
    }
}
