<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
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
        for($i=0;$i<7;$i++){
            $data[] = [
                'name' => $faker->name,
                'postage' => rand(10,45),
                'desc' => $faker->realText(50),
                'active' => rand(1,2),
            ];
        }
        DB::table('regions')->insert($data);
    }
}
