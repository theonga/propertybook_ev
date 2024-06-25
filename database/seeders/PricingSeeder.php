<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricings')->insert([
            [
                'package' => 'Starter',
                'price' => '0',
                'features' => 'Orci varius, Natoque penatibus, Parturient montes, Pascetur ridiculus mus',
                'description' => 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package' => 'Exclusive',
                'price' => '99',
                'features' => 'Orci varius, Natoque penatibus, Parturient montes, Pascetur ridiculus mus',
                'description' => 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package' => 'Premium',
                'price' => '250',
                'features' => 'Orci varius, Natoque penatibus, Parturient montes, Pascetur ridiculus mus',
                'description' => 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
