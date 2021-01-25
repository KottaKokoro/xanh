<?php

use yii\db\Migration;

/**
 * Class m210116_094714_phongban
 */
class m210116_094714_phongban extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%phongban}}', [
            'phongban_id' => $this->primaryKey(),
            'phongbanname' => $this->string()->notNull()->unique(),
            'phongban_id' => $this ->integer()->notNull()->unique(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m210116_094714_phongban cannot be reverted.\n";
        $this->dropTable('{{%phongban}}');
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210116_094714_phongban cannot be reverted.\n";

        return false;
    }
    */
}
