<?php

namespace app\modules\bookshop\models;

use app\modules\bookshop\interfaces\FileInterface;

class File implements FileInterface
{
    const CSV_FILENAME = 'books.csv';

    /**
     * @param array $params
     * @return int|null
     */
    public function createFile(array $params): ?int
    {
        $handle = fopen($this->getFullPath(), "a");

        fputcsv($handle, array_values( $params));

        fclose($handle);
    }

    /**
     * @param int $id
     * @param array $params
     * @return int|null
     */
    public function updateFile(int $id, array $params): ?int
    {
        $i = 0;
        $newData = [];

        if (($handle = fopen($this->getFullPath(), "r")) !== FALSE) {
            $dataArray = [];
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($data[0] == $id) {
                    $newData[$i][] = 2000;
                }

                $newData[$i][] = $data[0];
            }
        }

        // EXPORT CSV
        $fOpen = fopen($this->getFullPath(), 'r+');
        foreach ($newData as $newD) {
            fputcsv($fOpen, $newD);
        }

        fclose($handle);
    }

    /**
     * @param int $id
     * @return array
     */
    public function readFile(int $id): array
    {
        // Currently not implemented. Returns the read row!

        return $arr = ["READ FROM FILE"];
    }

    /**
     * @param int $id
     * @return int|null
     */
    public function deleteFile(int $id): ?int
    {
        // Currently not implemented. Returns the deleted row!

       return 1;
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'basic/web/files/' . self::CSV_FILENAME;
    }
}