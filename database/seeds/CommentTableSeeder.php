<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
        $member_ids = DB::table('members')->pluck('id')->toArray();
        $wine_ids = DB::table('wine')->pluck('id')->toArray();
        for($i=0;$i<100;$i++){
            $data[] = [
                'member_id' => $member_ids[array_rand($member_ids)],
                'wine_id' => $wine_ids[array_rand($wine_ids)],
                'review' => rand(2,5),
                'content' => $faker->realText(255),
                'created_at' => date('Y-m-d H:i:s',time()),
                'is_hidden' => rand(1,2),
            ];
        }
        DB::table('comments')->insert($data);
    }
}
