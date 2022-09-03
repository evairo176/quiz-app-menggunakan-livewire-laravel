<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_question' => '1',
            'name' => 'Dicki Prasetya',
            'email' => 'semenjakpetang176@gmail.com',
            'password' => bcrypt('admin123'),
            'priority' => 0,
            'answer' => 0,
            'score_quiz' => 0,
            'total_correct' => 0,
        ]);
    }
}
