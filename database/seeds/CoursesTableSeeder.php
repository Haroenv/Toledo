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
    DB::table('courses')->insert([
      'name' => 'BSysB',
      'fullname' => 'Basis Systeembeheer',
      'code' => 'JLW475',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'Engels 1',
      'fullname' => 'Engels 1 EO-ICT/OPT',
      'code' => 'JLWXTT',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'Ethiek',
      'fullname' => 'Ethiek 2ICT/EO',
      'code' => 'JLW465',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'ElekSign2',
      'fullname' => 'Elektronische Signalen 2',
      'code' => 'JLW469',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'R&SEss',
      'fullname' => 'Routing and switching essentials',
      'code' => 'JLW471',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'UXD',
      'fullname' => 'User Experience Design',
      'code' => 'JLW478',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'WT1',
      'fullname' => 'Wetenschappelijke toepassingen 1',
      'code' => 'JLW268',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'Projecten 1',
      'fullname' => 'Projecten 1 - Wetenschappelijk rapporteren (EOICT)',
      'code' => 'JLW473',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'µContr2',
      'fullname' => 'Microcontrollers 2',
      'code' => 'JLW466',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    DB::table('courses')->insert([
      'name' => 'WT2',
      'fullname' => 'Wetenschappelijke toepassingen 2',
      'code' => 'JLW141',
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
  }
}
