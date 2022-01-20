<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = new User();
    $user->name = "teransisi";
    $user->email = "admin@transisi.id";
    $user->password = Hash::make("transisi");
    $user->save();
  }
}
