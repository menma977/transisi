<?php

use App\model\Companies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompaniesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 100; $i++) {
      $company = new Companies();
      $company->name = Str::random(10);
      $company->email = Str::random(10) . '@gmail.com';
      $company->save();
    }
  }
}
