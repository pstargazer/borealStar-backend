<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Core\Coordinates;
use App\Models\Spot;
use Illuminate\Support\Facades\DB;
use MStaack\LaravelPostgis\Geometries\Point;


class SpotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Spot::truncate();
        Spot::factory(10)->create();
        // for ($i=0; $i < 100; $i++) { 
        //     // DB::raw("INSERT INTO public.spots values (nextval('spots_id_seq'::regclass), ST_POINT({fake()->latitude()}, {fake()->longitude()}), NOW()) ");
            
        // }
        //  INSERT INTO public.spots values (nextval('spots_id_seq'::regclass), ST_POINT(0, 0), NOW());

        // Spot::factory(10)->create([ 
            // 'coordinates' => new Point()
        // ]);

    }
}
