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
            'phone'=>'222',
            'password'=>bcrypt('123'),
            'permission'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Nguyễn Văn C',
            'email'=>'money@gmail.com',
            'email_verified_at'=>now(),
            'phone'=>'333',
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
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Nông hộ B',
            'phone'=>'0947 166 772',
            'address'=>'Thôn B',
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Khách hàng vãng lai 1',
            'phone'=>'0947 166 772',
            'address'=>'Thôn B',
            'state'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Khách hàng vãng lai 2',
            'phone'=>'0947 166 772',
            'address'=>'Thôn Bc',
            'state'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
            ],
        ]);
        
        DB::table('product')->insert([
            [
            'name'=>'Chè búp',
            'price'=>'300000',
            'deduction'=>'35',
            'state'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Chè móc câu',
            'price'=>'450000',
            'deduction'=>'30',
            'state'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Chè ướp hoa lài',
            'price'=>'500000',
            'deduction'=>'25',
            'state'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Chè nõn tôm',
            'price'=>'900000',
            'deduction'=>'20',
            'state'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'name'=>'Chè Đinh Ngọc',
            'price'=>'2500000',
            'deduction'=>'15',
            'state'=>'0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
        ]);
        DB::table('order')->insert([
            [
            'customer_id' => '1',
            'total_weight' => '300',
            'total_money'=>'268000000',
            'total_money_paid'=>'163000000',
            'status' => '1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'customer_id' => '2',
            'total_weight' => '45',
            'total_money'=>'151500000',
            'total_money_paid'=>'134500000',
            'status' => '0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'customer_id' => 3,
            'total_weight' => '50',
            'total_money'=>'202500000',
            'total_money_paid'=>'200700000',
            'status'=>'0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'customer_id' => 4,
            'total_weight' => '45',
            'total_money'=>'63000000',
            'total_money_paid'=>'61100000',
            'status' => '0',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'customer_id' => '1',
            'total_weight' => '190',
            'total_money'=>'261000000',
            'total_money_paid'=>'261000000',
            'status' => '1',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
    ]);
        DB::table('order_detail')->insert([
            [
            'order_id' => '2',
            'product_id'=>'1',
            'weight'=>'100',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'70',
            'price'=>'21000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '1',
            'product_id'=>'2',
            'weight'=>'200',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'160',
            'price'=>'72000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '3',
            'product_id'=>'2',
            'weight'=>'200',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'160',
            'price'=>'72000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '3',
            'product_id'=>'4',
            'weight'=>'200',
            'deduction_per'=>'15',
            'deduction_kg'=>'25',
            'weight_last'=>'145',
            'price'=>'130500000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'order_id' => '4',
            'product_id'=>'1',
            'weight'=>'100',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'70',
            'price'=>'63000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '1',
            'product_id'=>'4',
            'weight'=>'100',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'70',
            'price'=>'21000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '1',
            'product_id'=>'5',
            'weight'=>'100',
            'deduction_per'=>'10',
            'deduction_kg'=>'20',
            'weight_last'=>'70',
            'price'=>'175000000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id' => '2',
            'product_id'=>'4',
            'weight'=>'200',
            'deduction_per'=>'15',
            'deduction_kg'=>'25',
            'weight_last'=>'145',
            'price'=>'130500000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'order_id' => '5',
            'product_id'=>'4',
            'weight'=>'200',
            'deduction_per'=>'15',
            'deduction_kg'=>'25',
            'weight_last'=>'145',
            'price'=>'130500000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
            [
            'order_id' => '5',
            'product_id'=>'4',
            'weight'=>'200',
            'deduction_per'=>'15',
            'deduction_kg'=>'25',
            'weight_last'=>'145',
            'price'=>'130500000',
            'note'=>'nothong',
            'created_at'=>now(),
            'updated_at'=>now(),
            ],
        ]);

        DB::table('pays')->insert([
            [
            'order_id'=>'1',
            'money'=>'105000000',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id'=>'2',
            'money'=>'134500000',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id'=>'3',
            'money'=>'1800000',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            [
            'order_id'=>'4',
            'money'=>'1900000',
            'created_at'=>now(),
            'updated_at'=>now()
            ],
            
        ]);
    }
}
