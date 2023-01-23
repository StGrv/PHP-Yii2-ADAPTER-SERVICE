<?php

namespace app\modules\bookshop\interfaces;

interface BookInterface
{
    /**
     * @param array $params
     * @return int|null
     */
    public function createBook(array $params): ?int;

    /**
     * @param int $id
     * @param array $params
     * @return int|null
     */
    public function updateBook(int $id, array $params): ?int;

    /**
     * @param int $id
     * @return array
     */
    public function readBook(int $id): array;

    /**
     * @param int $id
     * @return int|null
     */
    public function deleteBook(int $id): ?int;
}