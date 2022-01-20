<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Core\CompaniesExportExcel;
use App\Http\Controllers\Core\CompaniesImportExcel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return Renderable
   */
  public function index(): Renderable
  {
    return view('home');
  }

  public function importExcel(Request $request): RedirectResponse
  {
    $this->validate($request, [
      'excel' => 'required|mimes:xls,xlsx'
    ]);
    Excel::import(new CompaniesImportExcel, $request->file('excel'));
    return redirect()->back()->with(['success' => 'Excel Data Imported successfully.']);
  }

  public function exportExcel(): BinaryFileResponse
  {
    return Excel::download(new CompaniesExportExcel(), 'companies.xlsx');
  }
}
