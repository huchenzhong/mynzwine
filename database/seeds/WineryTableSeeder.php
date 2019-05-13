<?php

use Illuminate\Database\Seeder;

class WineryTableSeeder extends Seeder
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
                'name' => $faker->company,
                'desc' => $faker->realText(255),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'created_at' => date('Y-m-d H:i:s',time()),
                'active' => rand(1,2),
            ];
        }
        DB::table('winery')->insert($data);
    }
}
