<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this -> call(CountsTableSeeder::class);
    }
}

class CountsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counts') -> insert ([
        	array('name' => 'Vật lý 2', 'desc' => 'Bài giảng vật lý 2', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 3', 'desc' => 'Bài giảng vật lý 3', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 4', 'desc' => 'Bài giảng vật lý 4', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 5', 'desc' => 'Bài giảng vật lý 5', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 6', 'desc' => 'Bài giảng vật lý 6', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 7', 'desc' => 'Bài giảng vật lý 7', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 8', 'desc' => 'Bài giảng vật lý 8', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 9', 'desc' => 'Bài giảng vật lý 9', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 10', 'desc' => 'Bài giảng vật lý 10', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 11', 'desc' => 'Bài giảng vật lý 11', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 12', 'desc' => 'Bài giảng vật lý 12', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 13', 'desc' => 'Bài giảng vật lý 13', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 14', 'desc' => 'Bài giảng vật lý 14', 'author' => 'Lê Hoài Name'),
        	array('name' => 'Vật lý 15', 'desc' => 'Bài giảng vật lý 15', 'author' => 'Lê Hoài Name'),]
        );
    }
}
