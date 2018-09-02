<?php

namespace app\common\model;

use traits\model\SoftDelete;

class Comment extends Base
{
    use SoftDelete;

    const COMMENTABLE_TYPE_BLOG = 1;
    const COMMENTABLE_TYPE_BOOK = 2;

    /**
     * 获取评论对应的多态模型
     */
    public function commentable()
    {
        return $this->morphTo(null, [
            self::COMMENTABLE_TYPE_BLOG => Blog::className(),
            self::COMMENTABLE_TYPE_BOOK => Book::className(),
        ]);
    }
}
