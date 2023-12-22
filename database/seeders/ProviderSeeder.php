<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'XL',
            ],
            [
                'name' => 'TELKOMSEL',
            ],
            [
                'name' => 'TRI',
            ],
            [
                'name' => 'INDOSAT',
            ],
            [
                'name' => 'AXIS',
            ],
        ];

        Provider::insert($data);
    }
}
