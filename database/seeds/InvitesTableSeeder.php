<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
  }
}
