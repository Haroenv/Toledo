<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class NotificationsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $faker = Faker::create();

      DB::table('notifications')->insert([
        'title' => $faker->realText($maxNbChars = 15, $indexSize = 2),
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'course_id' => 1,
      ]);
    }
}
