<?php
namespace common\migrations;

/**
 * Create user table.
 * @author Artem Rasskosov
 */

use yii\db\Migration;

class M171218233800User extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id'            => $this->primaryKey()->unsigned()->comment('User ID'),
            'password'      => $this->char(60)->notNull()->comment('User password'),
            'email'         => $this->string(32)->unique()->notNull()->comment('User email'),
            'auth_key'      => $this->char(32)->unique()->notNull()->comment('User auth key'),
            'name'          => $this->string(32)->null()->comment('User name'),
            'surname'       => $this->string(32)->null()->comment('User surname'),
            'date_created'  => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->comment('Date create'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
