<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class MySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Nyulak kényeztetése',
            'Nyulak ápolása',
            'Nyulak etetése',
            'Nyulak és a napozás',
            'Nyulak sétáltatása',
            'Nyulak szórakoztatása',
        ];

        foreach ($array as $name){
            Interest::create([
                'name' => $name,
            ]);
        }
    }
}
