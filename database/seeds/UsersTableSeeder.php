<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $faker = Faker::create();
    DB::table('users')->insert([
      'name' => $faker->name,
      'email' => 'u' . rand(10000,500000) . '@kuleuven.be',
      'password' => bcrypt('test'),
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);

    DB::table('users')->insert([
      'name' => $faker->name,
      'email' => 'r' . rand(10000,500000) . '@student.kuleuven.be',
      'password' => bcrypt('test'),
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
  }
}
