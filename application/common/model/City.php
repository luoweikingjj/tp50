<?php

namespace app\common\model;

use traits\model\SoftDelete;

class City extends Base
{
    use SoftDelete;

    /**
     * 获取城市的用户
     */
    public function users() {
        return $this->hasMany(User::className());
    }

    /**
     * 获取城市的所有博客
     */
    public function blogs() {
        return $this->hasManyThrough(Blog::className(), User::className());
    }
}
