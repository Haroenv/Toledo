<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('courses')->insert([
          'name' => str_random(10),
          'fullname' => str_random(20),
          'code' => 'JL' . str_random(1) . 345,
        ]);
    }
}
