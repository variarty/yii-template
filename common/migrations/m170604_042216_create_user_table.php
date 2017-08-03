<?php
/**
 * Create user table
 *
 * @author Artem Rasskosov
 * @since 16.07.2017
 */
use yii\db\Migration;

class m170716_042216_create_user_table extends Migration
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
            'auth_key'      => $this->string(32)->unique()->notNull()->comment('User auth key'),
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
