<?php

namespace app\modules\bookshop\interfaces;

interface BookServiceInterface
{
    /**
     * @param array $params
     * @return int|null
     */
    public function create(array $params): ?int;

    /**
     * @param int $id
     * @param array $params
     * @return int|null
     */
    public function update(int $id, array $params): ?int;

    /**
     * Read a book
     * @param int $id
     * @return array
     */
    public function read(int $id): array;

    /**
     * @param int $id
     * @return int|null
     */
    public function delete(int $id): ?int;
}