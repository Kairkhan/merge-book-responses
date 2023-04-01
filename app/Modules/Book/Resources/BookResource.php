<?php

declare(strict_types=1);

namespace App\Modules\Book\Resources;

use App\Modules\Book\DTO\Book;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Book $resource
 */
final class BookResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title'        => $this->resource->getTitle(),
            'description'  => $this->resource->getDescription(),
            'author'       => $this->resource->getAuthor(),
            'createdAt'    => $this->resource->getCreatedAt()
        ];
    }
}
