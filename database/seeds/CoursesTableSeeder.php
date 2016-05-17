<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Carbon\Carbon;

class CoursesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    for ($x = 0; $x <= 10; $x++) {
      DB::table('courses')->insert([
        'name' => str_random(10),
        'fullname' => str_random(20),
        'code' => 'JL' . str_random(1) . 345,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
  }
}
