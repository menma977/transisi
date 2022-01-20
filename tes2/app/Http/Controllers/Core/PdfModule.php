<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\model\Companies;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PdfModule extends Controller
{
  public function all(): Response
  {
    $companies = Companies::all();
    return PDF::loadView('pdf.index', compact('companies'))->setOptions(['defaultFont' => 'sans-serif'])->download('companies.pdf');
  }

  public function ech($id): Response
  {
    $companies = Companies::where("id", $id)->get();
    return PDF::loadView('pdf.index', compact('companies'))->setOptions(['defaultFont' => 'sans-serif'])->download("{$companies->first()->name}.pdf");
  }
}
