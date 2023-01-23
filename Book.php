<?php

namespace app\modules\bookshop\models;

use app\modules\bookshop\interfaces\BookInterface;
use yii\db\ActiveRecord;
use yii\web\Response;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property int $publisher_id
 * @property int $book_type_id
 * @property string $name
 * @property string $year_of_publication
 * @property float $price
 * @property int $total_quantity
 * @property int $available_quantity
 * @property int|null $circulation
 * @property string|null $field
 * @property string|null $sub_category
 * @property float|null $rating
 * @property string|null $deleted_at
 *
 */
class Book extends ActiveRecord implements BookInterface
{
    public $bookTitle;
    public $bookType;
    public $bookPublisher;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     * @return BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publisher_id', 'book_type_id', 'name', 'year_of_publication', 'price', 'total_quantity', 'available_quantity'], 'required'],
            [['publisher_id', 'book_type_id', 'total_quantity', 'available_quantity', 'circulation'], 'integer'],
            [['year_of_publication', 'deleted_at'], 'safe'],
            [['price', 'rating'], 'number'],
            [['name', 'sub_category'], 'string', 'max' => 100],
            [['field'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publisher_id' => 'Publisher ID',
            'book_type_id' => 'Book Type ID',
            'name' => 'Name',
            'year_of_publication' => 'Year Of Publication',
            'price' => 'Price',
            'total_quantity' => 'Total Quantity',
            'available_quantity' => 'Available Quantity',
            'circulation' => 'Circulation',
            'field' => 'Field',
            'sub_category' => 'Sub Category',
            'rating' => 'Rating',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @param array $params
     * @return int|null
     */
    public function createBook(array $params): ?int
    {
        $this->publisher_id = $params['publisher_id'];
        $this->book_type_id = $params['book_type_id'];
        $this->name = $params['name'];
        $this->year_of_publication = $params['year_of_publication'];
        $this->price = $params['price'];
        $this->total_quantity = $params['total_quantity'];
        $this->available_quantity = $params['available_quantity'];
        $this->circulation = $params['circulation'] ?? null;
        $this->field = $params['field'] ?? null;
        $this->sub_category = $params['sub_category'] ?? null;

        try {
            $this->save();

            return $this->id;
        } catch (\Exception $exception) {
            \Yii::error($exception->getMessage());

            return null;
        }
    }

    /**
     * @param int $id
     * @param array $params
     * @return int|null
     */
    public function updateBook(int $id, array $params): ?int
    {
        $model = self::findOne($id);

        $model->publisher_id = $params['publisher_id'];
        $model->book_type_id = $params['book_type_id'];
        $model->name = $params['name'];
        $model->year_of_publication = $params['year_of_publication'];
        $model->price = $params['price'];
        $model->total_quantity = $params['total_quantity'];
        $model->available_quantity = $params['available_quantity'];
        $model->circulation = $params['circulation'] ?? null;
        $model->field = $params['field'] ?? null;
        $model->sub_category = $params['sub_category'] ?? null;

        try {
            $model->update();

            return $model->id;
        } catch (\Exception $exception) {
            \Yii::error($exception->getMessage());

            return null;
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function readBook(int $id): array
    {
        return self::findOne($id)->toArray();
    }

    /**
     * @param int $id
     * @return int|null
     */
    public function deleteBook(int $id): ?int
    {
        $model = self::findOne($id);

        try {
            $model->delete();

            return $model->id;
        } catch (\Exception $exception) {
            \Yii::error($exception->getMessage());

            return null;
        }
    }

}
