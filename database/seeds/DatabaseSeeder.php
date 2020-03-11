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
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('123'),
            'permission'=>'0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'order',
            'email'=>'order@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('123'),
            'permission'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'money',
            'email'=>'money@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('123'),
            'permission'=>'2',
            'created_at'=>now(),
            'updated_at'=>now()
            ]
        ]);
    }
}
