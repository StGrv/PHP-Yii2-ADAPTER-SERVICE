<?php

namespace app\modules\bookshop\services;

use app\modules\bookshop\adapters\BookAdapter;
use app\modules\bookshop\interfaces\BookInterface;
use app\modules\bookshop\interfaces\BookServiceInterface;
use app\modules\bookshop\models\Book;

class BookService implements BookServiceInterface
{
    private BookInterface $book;

    public function __construct(BookInterface $book)
    {
        $this->book = $book;
    }

    public function create(array $params): ?int
    {
        return $this->book->createBook($params);
    }

    public function update(int $id, array $params): ?int
    {
        return $this->book->updateBook($id, $params);
    }

    public function read(int $id): array
    {
        return $this->book->readBook($id);
    }

    public function delete(int $id): ?int
    {
        return $this->book->deleteBook($id);
    }
}