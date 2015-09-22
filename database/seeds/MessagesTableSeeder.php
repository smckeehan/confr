<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('messages')->delete();

      $msgsArr = array(
        ['id' => 1, 'sender_id' => 2, 'receiver_id' => 1, 'subject' => 'Testing Message 1!', 'message' => 'Just testing a message :)', 'read' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 2, 'sender_id' => 2, 'receiver_id' => 1, 'subject' => 'Testing Message 2!', 'message' => 'Just testing a message :)', 'read' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 3, 'sender_id' => 2, 'receiver_id' => 1, 'subject' => 'Testing Message 3!', 'message' => 'Just testing a message :)', 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 4, 'sender_id' => 2, 'receiver_id' => 1, 'subject' => 'Testing Message 4!', 'message' => 'Just testing a message :)', 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 5, 'sender_id' => 2, 'receiver_id' => 1, 'subject' => 'Testing Message 5!', 'message' => 'Just testing a message :)', 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 6, 'sender_id' => 1, 'receiver_id' => 2, 'subject' => 'Testing Message 5!', 'message' => 'Just testing a message :)', 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 7, 'sender_id' => 1, 'receiver_id' => 3, 'subject' => 'Testing Message 5!', 'message' => 'Just testing a message :)', 'read' => false, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('messages')->insert($msgsArr);
    }
}
