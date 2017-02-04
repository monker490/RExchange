<?php

namespace api\modules\v1\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "loan".
 *
 * @property integer $LID
 * @property integer $Amount
 * @property double $Interest
 * @property integer $Duration
 * @property integer $Borrower_ID
 * @property string $Date
 */
class Loan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'Amount', 'Interest', 'Duration', 'Borrower_ID', 'Date'], 'required'],
            [['LID', 'Amount', 'Duration', 'Borrower_ID'], 'integer'],
            [['Interest'], 'number'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LID' => 'Lid',
            'Amount' => 'Amount',
            'Interest' => 'Interest',
            'Duration' => 'Duration',
            'Borrower_ID' => 'Borrower  ID',
            'Date' => 'Date',
        ];
    }
}
