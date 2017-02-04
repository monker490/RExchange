<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "vehicle".
 *
 * @property integer $loan_id
 * @property integer $borrower_id
 * @property string $model
 * @property string $plate_number
 */
class Vehicle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'borrower_id', 'model', 'plate_number'], 'required'],
            [['loan_id', 'borrower_id'], 'integer'],
            [['model', 'plate_number'], 'string', 'max' => 20],
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
            'model' => 'Model',
            'plate_number' => 'Plate Number',
        ];
    }
}