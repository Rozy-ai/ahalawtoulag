<?php

namespace backend\models;

use dvizh\gallery\widgets\Gallery;
use Yii;
use dvizh\gallery\models\Image;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title_tm
 * @property int $title_ru
 * @property int $title_en
 * @property string $main_page
 * @property string $status
 * @property int $category_id
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_tm', 'title_ru', 'title_en'], 'required'],
            [['status','fullname_tm', 'fullname_ru', 'fullname_en','description_tm', 'description_ru', 'description_en','products_tm', 'products_ru', 'products_en','legal_address_tm', 'legal_address_ru', 'legal_address_en'], 'string'],
            [['category_id','id'], 'integer'],
            [['category_id', 'created_at','updated_at','products_tm', 'products_ru', 'products_en','legal_address_tm', 'legal_address_ru', 'legal_address','phone','email','fax','expiration_date','fullname_tm', 'fullname_ru', 'fullname_en','main_page','id'], 'safe'],
            [['expiration_date'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_tm' => Yii::t('app', 'Title').' TM',
            'title_ru' => Yii::t('app', 'Title').' RU',
            'title_en' => Yii::t('app', 'Title').' EN',
            'fullname_tm' => Yii::t('app', 'Fullname').' TM',
            'fullname_ru' => Yii::t('app', 'Fullname').' RU',
            'fullname_en' => Yii::t('app', 'Fullname').' EN',
            'description_tm' => Yii::t('app', 'Description').' TM',
            'description_ru' => Yii::t('app', 'Description').' RU',
            'description_en' => Yii::t('app', 'Description').' EN',
            'products_tm' => Yii::t('app', 'Products').' TM',
            'products_ru' => Yii::t('app', 'Products').' RU',
            'products_en' => Yii::t('app', 'Products').' EN',
            'legal_address_tm' => Yii::t('app', 'Legal Address').' TM',
            'legal_address_ru' => Yii::t('app', 'Legal Address').' RU',
            'legal_address_en' => Yii::t('app', 'Legal Address').' EN',
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'fax' => Yii::t('app', 'Fax'),
            'status' => Yii::t('app', 'Status'),
            'expiration_date' => Yii::t('app', 'Expiration Date'),
            'category_id' => Yii::t('app', 'Category'),
            'main_page' => Yii::t('app', 'Home'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression("'" . date('Y-m-d H:i:s') . "'"),
            ],
            'images' => [
                'class' => 'dvizh\gallery\behaviors\AttachImages',
                'mode' => 'gallery',
                'quality' => 100,
                'galleryId' => 'gallereya'
            ],
        ];
    }

    public function getImageRelation()
    {
        return $this->hasOne(Image::className(), ['itemId' => 'id'])->andOnCondition(['modelName' => 'Services'])->orderBy(['image.isMain'=>SORT_DESC]);
    }

    public function getImageRelations()
    {
        return $this->hasMany(Image::className(), ['itemId' => 'id'])->andOnCondition(['modelName' => 'Services']);
    }

    public function getCategory()
    {
        return $this->hasOne(CompaniesCategory::className(), ['id' => 'category_id']);
    }

    public static function getSearchResults($title){
        $query = Services::find()
                ->filterWhere(['like', 'title_tm', $title])
                ->orWhere(['like', 'title_ru', $title])
                ->orWhere(['like', 'title_en', $title])
                ->orWhere(['like', 'fullname_tm', $title])
                ->orWhere(['like', 'fullname_ru', $title])
                ->orWhere(['like', 'fullname_en', $title])
                ->orWhere(['like', 'description_tm', $title])
                ->orWhere(['like', 'description_ru', $title])
                ->orWhere(['like', 'description_en', $title])
                ->all();

        //echo $query->createCommand()->getRawSql();die;
        /*echo'<pre>';
        print_r($query);
        echo'</pre>';die;*/

        return $query;
    }
}
