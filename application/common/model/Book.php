<?php

namespace app\common\model;

class Book extends Base
{
    /**
     * 获取所有针对书本的评论
     */
    public function comments()
    {
        return $this->morphMany(Comment::className(), 'commentable', Comment::COMMENTABLE_TYPE_BOOK);
    }
}
