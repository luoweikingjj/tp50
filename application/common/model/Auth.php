<?php

namespace app\common\model;

use think\model\Pivot;

class Auth extends Pivot
{
    public static function className() {
        return get_called_class();
    }
}
