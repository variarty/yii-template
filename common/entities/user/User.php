<?php
namespace common\entities\user;

/**
 * Main class for user entity.
 * @author Artem Rasskosov
 */

use DateTimeImmutable;
use yii\db\ActiveRecord;

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

    /**
     * @param string $email
     * @param string $password
     * @param string $authKey
     * @param Name|null $name
     *
     * @return self
     */
    public static function create($email, $password, $authKey, Name $name = null)
    {
        $model = new self();

        $model->setAttributes([
            'email'         => $email,
            'password'      => $password,
            'auth_key'      => $authKey,
            'name'          => $name ? $name->getFirst() : null,
            'surname'       => $name ? $name->getLast() : null,
            'date_create'   => date('Y-m-d H:i:s')
        ], false);

        return $model;
    }

    /**
     * Id getter.
     * Map: 'id' -> 'id'
     *
     * @return int
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * Password getter.
     * Map: 'password' -> 'password'
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->getAttribute('password');
    }

    /**
     * Email getter.
     * Map: 'email' -> 'email'
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getAttribute('email');
    }

    /**
     * Auth key getter.
     * Map: 'authKey' -> 'auth_key'
     *
     * @return string
     */
    public function getAuthKey()
    {
        return $this->getAttribute('auth_key');
    }

    /**
     * Full name getter.
     * Map: 'Name->first' -> 'name'
     * Map: 'Name->last' -> 'surname'
     *
     * @return Name
     */
    public function getName()
    {
        static $name;

        if ($name === null || $this->getDirtyAttributes(['name', 'surname'])) {
            $name = new Name($this->getAttribute('name'), $this->getAttribute('surname'));
        }

        return $name;
    }

    /**
     * Date create getter.
     * Readonly property.
     * Map: 'dateCreate' -> 'date_create'
     *
     * @return DateTimeImmutable
     */
    public function getDateCreate()
    {
        static $dateCreate;

        return $dateCreate ?? $dateCreate = new DateTimeImmutable($this->getAttribute('date_create'));
    }

    /**
     * @param string $newPassword
     */
    public function resetPassword($newPassword)
    {
        $this->setAttribute('password', $newPassword);
    }
}
