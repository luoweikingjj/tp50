<?php

namespace app\common\model;

class User extends Base
{
    /**
     * 获取用户所属的角色信息
     */
    public function roles()
    {
        return $this->belongsToMany(Role::className(), Auth::className());
    }

    /**
     * 获取用户发表的博客信息
     */
    public function blogs()
    {
        return $this->hasMany(Blog::className());
    }

    /**
     * 获取所有针对用户的评论
     */
    public function comments()
    {
        return $this->hasMany(Comment::className());
    }
}
