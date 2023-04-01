<?php

declare(strict_types=1);

namespace App\Modules\Book\DTO;

use App\Modules\Book\Strategies\FirstBookStoreStrategy;
use App\Modules\Book\Strategies\SecondBookStoreStrategy;

/**
 * @property string $title
 * @property string $description
 * @property ?string $createdAt
 * @property ?string $author
 */
final class Book
{
    public static function getStrategies(): array
    {
        return [
            FirstBookStoreStrategy::class,
            SecondBookStoreStrategy::class
        ];
    }

    public static function fromSecondBookStore(array $data): self
    {
        $self              = new self();
        $self->title       = $data['title'];
        $self->description = $data['descr'];
        $self->author      = $data['author'];
        $self->createdAt   = null;

        return $self;
    }

    public static function fromFirstBookStore(array $data): self
    {
        $self              = new self();
        $self->title       = $data['name'];
        $self->description = $data['description'];
        $self->createdAt   = $data['createdAt'];
        $self->author      = null;

        return $self;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }


    public function getAuthor(): ?string
    {
        return $this->author;
    }
}
