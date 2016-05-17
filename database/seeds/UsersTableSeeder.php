<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('users')->insert([
      'name' => str_random(10),
      'email' => 'u' . rand(10000,100000) . '@kuleuven.be',
      'password' => bcrypt('test'),
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);

    DB::table('users')->insert([
      'name' => str_random(10),
      'email' => 'r' . rand(10000,100000) . '@student.kuleuven.be',
      'password' => bcrypt('test'),
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
  }
}
