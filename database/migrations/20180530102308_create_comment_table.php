<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateCommentTable extends Migrator
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
        $table = $this->table('comment', ['comment' => '评论表']);
        $table->addColumn(Column::integer('user_id')->setComment('用户id'))
              ->addColumn(Column::string('content')->setComment('内容'))
              ->addColumn(Column::integer('commentable_id')->setComment('关系id'))
              ->addColumn(Column::string('commentable_type')->setComment('关系类型'))
              ->addTimestamps()
              ->addSoftDelete()
              ->create();
    }
}
