<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('CommunityTableSeeder');
        //$this->call('PostsTableSeeder');
        $this->call('InstancesTableSeeder');
        //$this->call('MessagesTableSeeder');
        //$this->call('CommentsTableSeeder');

        Model::reguard();
    }
}
