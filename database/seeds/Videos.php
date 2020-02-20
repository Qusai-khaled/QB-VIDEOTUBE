<?php

use App\Models\Video;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $images = [
            '1578445949download.jpg',
            '157844605385702_ca7a_9.jpg',
            '1578446916729226.png',
            'download.jpg',
            '15812066089iz1MTbqvcZJ15784455781625951.png',
            '1581294158jMPkiI6YcmDO1578524769773611.jpg',
            '1581294304Ajq316fkDhZw1578445782node-js-websockets-programming.png',
            '1581382359C1Oks9yT63Vll.jpg',
            '1581463094YoxHVu3195lc1578447089283028.jpg'
        ];

        $youtube = [
            'https://www.youtube.com/watch?v=Y49Ba16pK20',
            'https://www.youtube.com/watch?v=HuEmunei6ZY',
            'https://www.youtube.com/watch?v=iXKp4Pk3ic0',
            'https://www.youtube.com/watch?v=DQK-jxjEkEY',
            'https://www.youtube.com/watch?v=V1NI2rrThbo&t=40s',
            'https://www.youtube.com/watch?v=1N_jQa_qNyA',
            'https://www.youtube.com/watch?v=ON3G2OTalXU&t=1s',
            'https://www.youtube.com/watch?v=KzfQP2FOZsg&t=96s'
        ];
        $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        for ($i = 0; $i < 25; $i++) {
            $array = [
                'name' => $faker->word,
                'meta_keywords' => $faker->name,
                'meta_des' => $faker->name,
                'cat_id' => rand(1, 10),
                'youtube' => $youtube[rand(0, 7)],
                'published' =>  1,
                'image' => $images[rand(0, 8)],
                'des' => $faker->paragraph,
                'user_id' => 1
            ];
            $video = Video::create($array);
            $video->skills()->sync(array_rand($ids, 3));
            $video->tags()->sync(array_rand($ids, 3));
        }
    }
}
