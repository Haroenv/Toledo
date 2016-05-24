<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(CourseUserTableSeeder::class);
        $this->call(InvitesTableSeeder::class);
    }
}
