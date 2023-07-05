<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'first_name' => 'Luyện Hải',
                'last_name' => 'Đăng',
                'phone_number' => '0922002360',
                'email' => 'luyenhaidangit@gmail.com',
                'flat_plot' => '106 luyenhaidang',
                'company_name' => 'luyenhaidangit',
                'address' => 'Ngoc Long - Yen My - Hung Yen',
                'zip_code' => '12345',
                'country' => 'Vietnam',
                'city' => 'Hung Yen',
                'region_state' => '12345',
                'password' => Hash::make('haidang106'),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Đào Xuân',
                'last_name' => 'Đức',
                'phone_number' => '0385785369',
                'email' => 'daoxuanduc@gmail.com',
                'flat_plot' => '106 luyenhaidang',
                'company_name' => 'luyenhaidangit',
                'address' => 'Ngoc Long - Yen My - Hung Yen',
                'zip_code' => '12345',
                'country' => 'Vietnam',
                'city' => 'Hung Yen',
                'region_state' => '12345',
                'password' => Hash::make('haidang106'),
                'remember_token' => Str::random(10),
                'email_verified_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Customer::insert($data);
    }
}
