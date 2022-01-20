<?php

use App\model\Companies;
use App\model\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 100; $i++) {
      $company = new Employee();
      $company->name = Str::random(10);
      $company->email = Str::random(10) . '@gmail.com';
      $company->company_id = Companies::inRandomOrder()->first()->id;
      $company->save();
    }
  }
}
