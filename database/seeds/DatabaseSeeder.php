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
        $this->call(TableSeeder::class);
    }
}

class TableSeeder extends Seeder
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
            'name'=>'Nguyễn Văn A',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now(),
            'phone'=>'111',
            'password'=>bcrypt('123'),
            'permission'=>'0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Nguyễn Văn B',
            'email'=>'order@gmail.com',
            'email_verified_at'=>now(),
            'phone'=>'111',
            'password'=>bcrypt('123'),
            'permission'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Nguyễn Văn C',
            'email'=>'money@gmail.com',
            'email_verified_at'=>now(),
            'phone'=>'111',
            'password'=>bcrypt('123'),
            'permission'=>'2',
            'created_at'=>now(),
            'updated_at'=>now()
            ]
        ]);

        DB::table('customer')->insert([
            [
            'name'=>'Nông hộ A',
            'phone'=>'0837 462 632',
            'address'=>'Thôn A',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Nông hộ B',
            'phone'=>'0947 166 772',
            'address'=>'Thôn B',
            'created_at'=>now(),
            'updated_at'=>now()
            ]
        ]);
        
        DB::table('product')->insert([
            [
            'name'=>'Chè búp 1',
            'price'=>'100000',
            'deduction'=>'35',
            'state'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Chè búp 2',
            'price'=>'200000',
            'deduction'=>'30',
            'state'=>'0',
            'created_at'=>now(),
            'updated_at'=>now()
            ]
        ]);
    }
}
