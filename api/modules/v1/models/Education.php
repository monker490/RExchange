<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "education".
 *
 * @property integer $loan_id
 * @property integer $borrower_id
 * @property string $institution
 * @property string $graduation
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_id', 'borrower_id', 'institution', 'graduation'], 'required'],
            [['loan_id', 'borrower_id'], 'integer'],
            [['graduation'], 'safe'],
            [['institution'], 'string', 'max' => 25],
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
            'institution' => 'Institution',
            'graduation' => 'Graduation',
        ];
    }
}
