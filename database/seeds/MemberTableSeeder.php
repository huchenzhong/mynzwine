<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
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
        for($i=0;$i<50;$i++){
            $data[] = [
              'email' => $faker->email,
              'password' => bcrypt('123456'),
              'fname' => $faker->firstName,
              'lname' => $faker->lastName,
              'title' => rand(1,4),
              'phone' => $faker->phoneNumber,
              'address_city' => $faker->city,
              'address_suburb' => 'Silent hill',
              'address_street' => $faker->streetAddress,
              'postcode' => $faker->postcode,
              'avatar' => '/admin/images/uploads/member/example.jpg',
              'like_wine' => "1,2,3",
              'active' => rand(1,2),
              'created_at' => date('Y-m-d H:i:s',time()),

            ];
        }
        DB::table('members')->insert($data);
    }
}
