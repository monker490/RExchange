<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "borrower".
 *
 * @property integer $BID
 * @property string $Name
 * @property string $Address
 */
class Borrower extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'borrower';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BID', 'Name', 'Address'], 'required'],
            [['BID'], 'integer'],
            [['Name'], 'string', 'max' => 30],
            [['Address'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BID' => 'Bid',
            'Name' => 'Name',
            'Address' => 'Address',
        ];
    }
}