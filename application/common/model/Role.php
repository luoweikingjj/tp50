<?php

namespace app\common\model;

use traits\model\SoftDelete;

class Role extends Base
{
    use SoftDelete;

    /**
     * 获取角色下面的用户信息
     */
    public function users()
    {
        return $this->belongsToMany(User::className(), Auth::className());
    }
}
