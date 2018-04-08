<?php
namespace app\forms;

/**
 * Form for create/update user
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;
use common\services\dto\UserDto;

class UserForm extends Model
{
    /**
     * @var string $email
     */
    public $email;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $surname
     */
    public $surname;

    /**
     * @var string $authKey
     */
    public $authKey;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 31],

            ['name', 'required'],
            ['surname', 'required'],

            ['authKey', 'required'],
            ['authKey', 'string', 'min' => 16],
        ];
    }

    /**
     * @return UserDto
     */
    public function getDto()
    {
        /** @var UserDto $dto */
        $dto = Yii::configure(new UserDto(), [
            'email'     => $this->email,
            'name'      => $this->name,
            'surname'   => $this->surname,
            'authKey'   => $this->authKey,
        ]);

        return $dto;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('form/label', 'Name'),
            'surname' => Yii::t('form/label', 'Surname'),
            'email' => Yii::t('form/label', 'Email'),
            'authKey' => Yii::t('form/label', 'Auth key'),
        ];
    }
}
