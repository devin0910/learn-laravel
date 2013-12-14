<?php

class PostsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

        $posts = [
            ['title' => 'The first post', 'content' => $lorem],
            ['title' => 'The second post', 'content' => $lorem],
            ['title' => 'The third post', 'content' => $lorem],
            ['title' => 'The fourth post', 'content' => $lorem],
            ['title' => 'zzz', 'content' => $lorem],
            ['title' => 'zzzzzzz', 'content' => $lorem]
        ];
 
        DB::table('posts')->insert($posts);
    }
}