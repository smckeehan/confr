<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comments')->delete();

      $commentsArr = array(
        ['id' => 1, 'message' => 'Just a test comment!', 'post_id' => 1, 'user_id' => 1, 'points' => 22, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 2, 'message' => 'Just a test comment!', 'post_id' => 1, 'user_id' => 2, 'points' => 12, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 3, 'message' => 'Just a test comment!', 'post_id' => 2, 'user_id' => 2, 'points' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 4, 'message' => 'Just a test comment!', 'post_id' => 2, 'user_id' => 3, 'points' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 5, 'message' => 'Just a test comment!', 'post_id' => 3, 'user_id' => 4, 'points' => 44, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('comments')->insert($commentsArr);
    }
}
