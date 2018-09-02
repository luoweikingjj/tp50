<?php

use app\common\model\Auth;
use app\common\model\Blog;
use app\common\model\Book;
use app\common\model\Cate;
use app\common\model\City;
use app\common\model\Comment;
use app\common\model\Content;
use app\common\model\Role;
use app\common\model\User;
use think\migration\Seeder;

class DataInitSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $roleIds = [];
        $roleNames = ['admin', 'developer', 'tester'];
        foreach ($roleNames as $roleName) {
            $role = Role::create(['name' => $roleName]);
            $roleIds[] = $role->id;
        }

        $cityIds = [];
        $cityNames = ['beijing', 'shanghai', 'guangzhou', 'shenzhen', 'hangzhou'];
        foreach ($cityNames as $cityName) {
            $city = City::create(['name' => $cityName]);
            $cityIds[] = $city->id;
        }


        $userIds = [];
        for ($i = 0; $i < 40; $i++) {
            $user = User::create([
                'username' => 'username_'.$i,
                'nickname' => 'nickname_'.$i,
                'password' => md5(123456),
                'email'    => 'tp_'.$i.'@mail.com',
                'city_id'  => $cityIds[array_rand($cityIds)],
            ]);
            $userIds[] = $user->id;

            $auth = Auth::create([
                'user_id' => $user->id,
                'role_id' => $roleIds[array_rand($roleIds)],
            ]);
        }

        //分类、博客及评论
        $cateNames = ['Java', 'PHP', 'Python'];
        foreach ($cateNames as $cateName) {
            $cate = Cate::create(['name' => $cateName]);

            for ($i = 0; $i < 10; $i++) {
                $blog = Blog::create([
                    'title'   => $cate->name . 'blog_' . $i,
                    'cate_id' => $cate->id,
                    'user_id' => $userIds[array_rand($userIds)],
                ]);
                $blogContent = Content::create([
                    'blog_id' => $blog->id,
                    'data' => $blog->title . 'data',
                ]);

                for ($j = 0; $j < 10; $j++) {
                    $comment = Comment::create([
                        'user_id' => $userIds[array_rand($userIds)],
                        'content' => $blog->title . 'comment_' . $j,
                        'commentable_id' => $blog->id,
                        'commentable_type' => Comment::COMMENTABLE_TYPE_BLOG,
                    ]);
                }
            }

            //书本及评论
            for ($i = 0; $i < 10; $i++) {
                $book = Book::create([
                    'name'   => $cate->name . 'book_' . $i,
                    'cate_id' => $cate->id,
                ]);
                for ($j = 0; $j < 10; $j++) {
                    $comment = Comment::create([
                        'user_id' => $userIds[array_rand($userIds)],
                        'content' => $book->name . 'comment_' . $j,
                        'commentable_id' => $book->id,
                        'commentable_type' => Comment::COMMENTABLE_TYPE_BOOK,
                    ]);
                }
            }
        }
    }
}