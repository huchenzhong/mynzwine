<?php

use Illuminate\Database\Seeder;

class WineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $data = [];
        $winery_ids = DB::table('winery')->pluck('id')->toArray();
        $varietal_ids = DB::table('varietal')->pluck('id')->toArray();
        for($i=0;$i<20;$i++){
            $data[] = [
                'name' => $faker->company,
                'price' => rand(6.99,39.99),
                'image' => '/admin/images/wine/example.jpg',
                'desc' => $faker->realText(255),
                'is_soldout' => rand(1,2),
                'winery_id' => $winery_ids[array_rand($winery_ids)],
                'varietal_id' => $varietal_ids[array_rand($varietal_ids)],
            ];
        }
        DB::table('wine')->insert($data);
    }
}
