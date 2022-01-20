<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Core\CompaniesModule;
use App\Http\Controllers\Core\EmployeeModule;
use App\model\Companies;
use App\model\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  public function index()
  {
    $employees = EmployeeModule::index();
    return view('employees.index', compact('employees'));
  }

  public function create()
  {
    $companies = CompaniesModule::index();
    return view('employees.create', compact('companies'));
  }

  public function store(Request $request): RedirectResponse
  {
    $this->validate($request, [
      "name" => "required|string",
      "email" => "required|email",
      "companies" => "required|numeric|exists:companies,id"
    ]);

    $response = EmployeeModule::store($request);
    return redirect()->route('employee.index')->with(["success" => $response["message"]]);
  }

  public function edit($id)
  {
    $companies = CompaniesModule::index();
    $employee = Employee::find($id);
    $employee->companies = Companies::find($employee->companies_id);
    return view('employees.edit', compact('employee', 'companies'));
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $this->validate($request, [
      "name" => "nullable|string",
      "email" => "nullable|email",
      "companies" => "nullable|numeric|exists:companies,id"
    ]);

    $response = EmployeeModule::store($request, $id);
    return redirect()->route('employee.index')->with(["success" => $response["message"]]);
  }

  public function destroy($id): RedirectResponse
  {
    $response = EmployeeModule::destroy($id);
    return redirect()->route('employee.index')->with(["success" => $response["message"]]);
  }
}
