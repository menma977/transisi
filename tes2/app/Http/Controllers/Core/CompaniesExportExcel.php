<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\model\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExportExcel implements FromCollection
{
  public function collection()
  {
    return Companies::all();
  }
}
