<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateUserTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('user',['comment' => '用户表']);
        $table->addColumn(Column::string('username')->setLimit(32)->setComment('用户名'))
              ->addColumn(Column::string('nickname')->setLimit(32)->setComment('昵称'))
              ->addColumn(Column::string('password')->setLimit(32)->setComment('密码'))
              ->addColumn(Column::string('email')->setDefault('')->setComment('邮箱'))
              ->addColumn(Column::string('remark')->setDefault('')->setComment('备注'))
              ->addColumn(Column::integer('city_id')->setComment('城市id'))
              ->addIndex(['username'], ['unique' => true])
              ->addIndex(['email'], ['unique' => true])
              ->addTimestamps()
              ->create();
    }
}
