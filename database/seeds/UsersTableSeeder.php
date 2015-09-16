<?php

use blog\Post;
use blog\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();

        factory(blog\User::class, 10)->create()->each(function ($user) {
            $post = factory(blog\Post::class)->make();
            $user->posts()->save($post);
        });
    }
}
