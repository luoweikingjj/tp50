<?php

namespace app\common\model;

use traits\model\SoftDelete;

class Content extends Base
{
    use SoftDelete;

    /**
     * 获取内容所属的博客信息
     */
    public function blog()
    {
        return $this->belongsTo(Blog::className());
    }
}
