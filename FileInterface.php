<?php

namespace app\modules\bookshop\interfaces;

interface FileInterface
{
    /**
     * @param array $params
     * @return int|null
     */
    public function createFile(array $params): ?int;

    /**
     * @param int $id
     * @param array $params
     * @return int|null
     */
    public function updateFile(int $id, array $params): ?int;

    /**
     * @param int $id
     * @return array
     */
    public function readFile(int $id): array;

    /**
     * @param int $id
     * @return int|null
     */
    public function deleteFile(int $id): ?int;

    /**
     * @return string
     */
    public function getFullPath(): string;
}