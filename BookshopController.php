<?php

namespace app\controllers;

use app\modules\bookshop\interfaces\BookServiceInterface;
use Yii;
use yii\web\Response;

class BookshopController extends \yii\base\Controller
{
    private BookServiceInterface $bookService;

    public function __construct($id, $module, BookServiceInterface $bookService, $config = [])
    {
        $this->bookService = $bookService;

        parent::__construct($id, $module, $config);
    }

    public function actionInstanceService()
    {
        var_dump($this->bookService->read(1));
    }
}