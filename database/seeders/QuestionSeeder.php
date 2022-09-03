<?php

namespace Database\Seeders;

use App\Models\tb_question;
use Faker\Factory as faker;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create('id_Id');
        foreach (range(1, 12) as $index => $item) {
            tb_question::create([
                'priority' => $index + 1,
                'body' => $faker->text($maxNoChars = 150),
                'answers' => json_encode($faker->sentences($nb = 4, $asText = false)),
                'correct' => $faker->numberBetween(0, 3)
            ]);
        }
    }
}
