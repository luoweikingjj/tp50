<?php

namespace app\common\model;

use traits\model\SoftDelete;

class Cate extends Base
{
    use SoftDelete;

    /**
     * 获取分类下的所有博客信息
     */
    public function blogs()
    {
        return $this->hasMany(Blog::className());
    }
}
