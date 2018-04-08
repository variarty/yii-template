<?php
namespace app\forms;

/**
 * Form for recovery user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;

class PasswordResetRequestForm extends Model
{
    /**
     * @var string $email
     */
    public $email;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('form/label', 'Your email'),
        ];
    }
}
