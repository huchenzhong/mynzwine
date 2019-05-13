<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建一个生成器对象
        $faker = \Faker\Factory::create();

        $data = [];
        for ($i=0;$i<100;$i++) {

            //使用生成器对象来生成模拟数据.没生成一条数据将其加入到data数组中
            $data[] = [
                'username' => $faker->userName,
                'password' => bcrypt('123456'),
                'gender' => rand(1, 3),
                'mobile' => $faker->phoneNumber,
                'email' => $faker->email,
                'role_id' => rand(1, 2),
                'created_at' => date('Y-m-d:H:i:s'),
                'status' => rand(1, 2)
            ];
        }
        DB::table('admins')->insert($data);
    }
}
