<?php

use Illuminate\Database\Seeder;

class InvitesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    for ($i=0; $i < 10; $i++) {
      DB::table('invites')->insert([
        'code' => str_random(20),
      ]);
    }
  }
}
