<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateContentTable extends Migrator
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
        $table = $this->table('content', ['comment' => '博客内容表']);
        $table->addColumn(Column::integer('blog_id')->setComment('博客id'))
              ->addColumn(Column::text('data')->setComment('内容'))
              ->addTimestamps()
              ->addSoftDelete()
              ->create();
    }
}
