<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodeTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('barcode_tests')->insert([
            [
                'imei' => 'C1201225K02901',
                'model_name' => 'ABC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
