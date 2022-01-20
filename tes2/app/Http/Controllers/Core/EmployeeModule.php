<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\model\Companies;
use App\model\Employee;
use Illuminate\Http\Request;

class EmployeeModule extends Controller
{
  public static function index()
  {
    $employees = Employee::paginate(5);
    $employees->getCollection()->transform(function ($item) {
      $item->company = Companies::find($item->company_id);
      return $item;
    });

    return $employees;
  }

  public static function store(Request $request, $id = null): array
  {
    if ($id) {
      $employee = Employee::find($id);
    } else {
      $employee = new Employee();
    }

    if ($request->has("name")) {
      $employee->name = $request->input("name");
    }
    if ($request->has("email")) {
      $employee->email = $request->input("email");
    }
    if ($request->has("companies")) {
      $employee->company_id = $request->input("companies");
    }

    $employee->save();

    return [
      "status" => true,
      "message" => "Employee saved successfully",
    ];
  }

  public static function destroy($id): array
  {
    $employee = Employee::find($id);
    $employee->delete();

    return [
      "status" => true,
      "message" => "Employee deleted successfully",
    ];
  }
}
