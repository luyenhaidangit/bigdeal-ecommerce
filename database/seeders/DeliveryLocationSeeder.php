<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryLocation;

class DeliveryLocationSeeder extends Seeder
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
                'address' => 'Ngọc Long - Yên Mỹ - Hưng Yên',
                'code' => '1006',
                'max_delivery_time' => '15:00:00',
                'shipping_fee' => 10000,
            ],
            [
                'address' => 'Ngọc Tỉnh - Yên Mỹ - Hưng Yên',
                'code' => '1007',
                'max_delivery_time' => '15:00:00',
                'shipping_fee' => 15000,
            ],
        ];

        DeliveryLocation::insert($data);
    }
}
