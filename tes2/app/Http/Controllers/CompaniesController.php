<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Core\CompaniesModule;
use App\model\Companies;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
  public function index()
  {
    $companies = CompaniesModule::index();
    return view('companies.index', compact('companies'));
  }

  public function create()
  {
    return view('companies.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email',
      'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
    ]);

    $response = CompaniesModule::store($request);

    return redirect()->route('company.index')->with(["success" => $response["message"]]);
  }

  public function search(Request $request): JsonResponse
  {
    if ($request->ajax()) {
      $company = Companies::select('id', 'name as text')->where('name', "like", "%{$request->input("term")}%")->simplePaginate(10);
      $morePages = true;
      if (empty($company->nextPageUrl())) {
        $morePages = false;
      }
      return response()->json([
        'results' => $company->items(),
        "pagination" => [
          "more" => $morePages
        ]
      ]);
    }
    return response()->json([]);
  }

  public function edit($id)
  {
    $company = Companies::find($id);
    return view('companies.edit', compact('company'));
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $this->validate($request, [
      'name' => 'nullable|string',
      'email' => 'nullable|email',
      'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',
    ]);

    $response = CompaniesModule::store($request, $id);

    return redirect()->route('company.index')->with(["success" => $response["message"]]);
  }

  public function destroy($id): RedirectResponse
  {
    $response = CompaniesModule::destroy($id);

    return redirect()->route('company.index')->with(["success" => $response["message"]]);
  }
}
