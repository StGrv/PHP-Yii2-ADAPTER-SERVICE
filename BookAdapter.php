<?php

namespace app\modules\bookshop\adapters;

use app\modules\bookshop\models\Book;
use app\modules\bookshop\models\File;

class BookAdapter extends Book
{
    private $file;

    public function __construct($config = [])
    {
        $this->file = new File();

        parent::__construct($config);
    }

    public function createBook(array $params): ?int
    {
        return $this->file->createFile($params);
    }

    public function updateBook(int $id, array $params): ?int
    {
        return $this->file->updateFile($id, $params);
    }

    public function readBook(int $id): array
    {
        return $this->file->readFile($id);
    }

    public function deleteBook(int $id): ?int
    {
        return $this->file->deleteFile($id);
    }
}