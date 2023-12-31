<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('languages')->insert([
          'code' => 'en',
          'name' => 'English',
          'image' => 'Flag_of_the_United_States.png',
      ]);
    }
}
