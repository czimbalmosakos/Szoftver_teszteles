<?php

namespace Database\Seeders;

use App\Models\BloodType;
use App\Models\Interest;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            '0+',
            'A+',
            'B+',
            '0-',
            'A-',
            'AB+',
            'B-',
            'AB-'
        ];

        foreach ($array as $name){
            BloodType::create([
                'name' => $name,
            ]);
        }
    }
}
