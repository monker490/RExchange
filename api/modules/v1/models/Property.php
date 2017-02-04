<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "property".
 *
 * @property integer $loan_id
 * @property integer $borrower_id
 * @property string $type
 * @property string $location
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'borrower_id', 'type', 'location'], 'required'],
            [['loan_id', 'borrower_id'], 'integer'],
            [['type'], 'string', 'max' => 15],
            [['location'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loan_id' => 'Loan ID',
            'borrower_id' => 'Borrower ID',
            'type' => 'Type',
            'location' => 'Location',
        ];
    }
}