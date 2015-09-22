<?php

use Illuminate\Database\Seeder;

class CommunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('communities')->delete();

      $communityArr = array(
        ['id' => 1, 'name' => 'University News', 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 2, 'name' => 'Free Food', 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 3, 'name' => 'University Events', 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 4, 'name' => 'Parties', 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 5, 'name' => 'Winter Carnival', 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('communities')->insert($communityArr);
    }
}
