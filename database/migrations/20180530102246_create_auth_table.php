<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateAuthTable extends Migrator
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
        $table = $this->table('auth', ['comment' => '角色表']);
        $table->addColumn(Column::integer('user_id')->setComment('用户id'))
              ->addColumn(Column::integer('role_id')->setComment('角色id'))
              ->addTimestamps()
              ->create();
    }
}
