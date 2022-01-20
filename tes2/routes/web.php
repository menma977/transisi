<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\Core\PdfModule;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", static function () {
  return redirect()->route("home");
});

Auth::routes();

Route::middleware(["auth"])->group(function () {
  Route::get('/home', [HomeController::class, "index"])->name('home');
  Route::get('/pdf', [PdfModule::class, "all"])->name('pdf');
  Route::get('/export/excel', [HomeController::class, "exportExcel"])->name('export.excel');
  Route::post('/import/excel', [HomeController::class, "importExcel"])->name('import.excel');
  Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
    Route::get("", [CompaniesController::class, "index"])->name("index");
    Route::get("create", [CompaniesController::class, "create"])->name("create");
    Route::post("store", [CompaniesController::class, "store"])->name("store");
    Route::get("search", [CompaniesController::class, "search"])->name("search");
    Route::get("edit/{id}", [CompaniesController::class, "edit"])->name("edit");
    Route::post("update/{id}", [CompaniesController::class, "update"])->name("update");
    Route::get("delete/{id}", [CompaniesController::class, "destroy"])->name("delete");
    Route::get("pdf/{id}", [PdfModule::class, "ech"])->name("pdf");
  });

  Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get("", [EmployeeController::class, "index"])->name("index");
    Route::get("create", [EmployeeController::class, "create"])->name("create");
    Route::post("store", [EmployeeController::class, "store"])->name("store");
    Route::get("edit/{id}", [EmployeeController::class, "edit"])->name("edit");
    Route::post("update/{id}", [EmployeeController::class, "update"])->name("update");
    Route::get("delete/{id}", [EmployeeController::class, "destroy"])->name("delete");
  });
});

