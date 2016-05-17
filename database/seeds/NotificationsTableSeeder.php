<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Carbon\Carbon;

class NotificationsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $faker = Faker::create();
    for ($x = 0; $x <= 10; $x++) {
      for ($y = 0; $y <= 5; $y++) {
        DB::table('notifications')->insert([
          'title' => $faker->realText($maxNbChars = 15, $indexSize = 2),
          'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
          'course_id' => $x,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      }
    }
  }
}
