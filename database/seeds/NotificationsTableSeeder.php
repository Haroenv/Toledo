<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('notifications')->insert([
        'title' => str_random(10),
        'content' => str_random(200),
        'course_id' => 1,
      ]);
    }
}
