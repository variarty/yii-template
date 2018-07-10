<?php
namespace common\entities\user;

/**
 * Main class for user entity.
 * @author Artem Rasskosov
 */

use DateTimeImmutable;
use yii\db\ActiveRecord;

/**
 * Class User
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $name
 * @property string $surname
 * @property string $date_created
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new Query(get_called_class());
    }

    public static function create(string $email, string $password, string $authKey, string $name = null, string $surname = null)
    {
        $model           = new self();
        $model->email    = $email;
        $model->password = $password;
        $model->auth_key = $authKey;
        $model->name     = $name;
        $model->surname  = $surname;

        return $model;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getFullName(): string
    {
        return trim("$this->name $this->surname");
    }

    public function getDateCreated(): ?string
    {
        return $this->date_created;
    }

    public function resetPassword(string $newPassword): void
    {
        $this->password = $newPassword;
    }
}
