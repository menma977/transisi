<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\model\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CompaniesImportExcel implements ToModel
{
  public function model(array $row): Companies
  {
    return new Companies([
      'name' => $row[0],
      'email' => $row[1],
      'logo' => $row[2],
      'created_at' => $row[3],
      'updated_at' => $row[4],
    ]);
  }
}
