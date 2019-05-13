<?php

use Illuminate\Database\Seeder;

class VarietalTableSeeder extends Seeder
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
        for($i=0;$i<5;$i++){
            $data[] = [
                'name' => $faker->name,
                'desc' => $faker->realText(255)
            ];
        }
        DB::table('varietal')->insert($data);
    }
}
