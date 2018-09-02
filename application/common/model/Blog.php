<?php

namespace app\common\model;

use think\Log;
use traits\model\SoftDelete;

class Blog extends Base
{
    use SoftDelete;

    /**
     * 获取博客所属的用户
     */
    public function user()
    {
        return $this->belongsTo(User::className());
    }

    /**
     * 获取博客的内容
     */
    public function content()
    {
        return $this->hasOne(Content::className());
    }

    /**
     * 获取所有博客所属的分类
     */
    public function cate()
    {
        return $this->belongsTo(Cate::className());
    }

    /**
     * 获取所有针对文章的评论
     */
    public function comments()
    {
        return $this->morphMany(Comment::className(), 'commentable', Comment::COMMENTABLE_TYPE_BLOG);
    }

    protected static function init() {
        //博客模型事件
        self::event('before_insert', function ($blog) {
            Log::write('blog before_insert');

            return true; //如果返回false after_insert事件将不会触发
        });
        //注册多个回调
        self::event('before_insert', function ($blog) {
            Log::write('other callback');
        });
        //覆盖回调
        self::event('before_insert', function ($blog) {
            Log::write('override callback');
        }, true);

        self::event('after_insert', function ($blog) {
            Log::write('blog after_insert');
        });


        self::event('before_update', function ($blog) {
            Log::write('blog before_update');

            return true; //如果返回false after_update事件将不会触发
        });
        self::event('after_update', function ($blog) {
            Log::write('blog after_update');
        });


        self::event('before_write', function ($blog) {
            Log::write('blog before_write');

            return true; //如果返回false after_write事件将不会触发
        });
        self::event('after_write', function ($blog) {
            Log::write('blog after_write');
        });


        self::event('before_delete', function ($blog) {
            Log::write('blog before_delete');

            return true; //如果返回false after_delete事件将不会触发
        });
        self::event('after_delete', function ($blog) {
            Log::write('blog after_delete');
        });

        parent::init();
    }
}
