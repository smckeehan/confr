<?php

use Illuminate\Database\Seeder;

class InstancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('instances')->delete();

      $instanceArr = array(
        ['id' => 1, 'name' => 'Test State University', 'tld' => 'test.edu', 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('instances')->insert($instanceArr);
    }
}
