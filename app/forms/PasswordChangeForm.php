<?php
namespace app\forms;

/**
 * Form for change user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;

class PasswordChangeForm extends Model
{
    /**
     * @var string $password
     */
    public $password;

    /**
     * @var string $passwordRepeat
     */
    public $passwordRepeat;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['passwordRepeat', 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '===']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password'          => Yii::t('app', 'New password'),
            'passwordRepeat'    => Yii::t('app', 'Repeat password'),
        ];
    }
}
