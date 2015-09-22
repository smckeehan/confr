<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $userArr = array(
          ['id' => 1, 'first_name' => 'Shaun', 'last_name' => 'McKeehan', 'email' => 'shaun@test.edu', 'password' => bcrypt('ConfrTest!'), 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'first_name' => 'Dan', 'last_name' => 'Fink', 'email' => 'dan@test.edu', 'password' => bcrypt('ConfrDan'), 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 3, 'first_name' => 'Ben', 'last_name' => 'Weyland', 'email' => 'ben@test.edu', 'password' => bcrypt('ConfrBen'), 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 4, 'first_name' => 'Marissa', 'last_name' => 'McKeehan', 'email' => 'marissa@test.edu', 'password' => bcrypt('ConfrMarissa'), 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 5, 'first_name' => 'Roger', 'last_name' => 'Ellis', 'email' => 'roger@test.edu', 'password' => bcrypt('ConfrRoger'), 'instance_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('users')->insert($userArr);
    }
}
