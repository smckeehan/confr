<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->delete();

      $postsArr = array(
        ['id' => 1, 'title' => 'Test1', 'description' => 'Just an initial test.', 'url' => 'http://google.com', 'community_id' => 1, 'user_id' => 1, 'comments_count' => 13, 'points' => 103, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 2, 'title' => 'Test2', 'description' => 'Just an initial test.', 'url' => 'http://google.com', 'community_id' => 2, 'user_id' => 1, 'comments_count' => 13, 'points' => 112, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 3, 'title' => 'Test3', 'description' => 'Just an initial test.', 'url' => 'http://google.com', 'community_id' => 2, 'user_id' => 2, 'comments_count' => 13, 'points' => 1203, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 4, 'title' => 'Test4', 'description' => 'Just an initial test.', 'url' => 'http://google.com', 'community_id' => 3, 'user_id' => 3, 'comments_count' => 13, 'points' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 5, 'title' => 'Test5', 'description' => 'Just an initial test.', 'url' => 'http://google.com', 'community_id' => 4, 'user_id' => 4, 'comments_count' => 13, 'points' => 7, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('posts')->insert($postsArr);
    }
}
