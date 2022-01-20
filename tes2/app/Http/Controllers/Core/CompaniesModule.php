<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\model\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompaniesModule extends Controller
{
  public static function index()
  {
    return Companies::paginate(5);
  }

  public static function store(Request $request, $id = null): array
  {
    if ($id) {
      $company = Companies::find($id);
    } else {
      $company = new Companies();
    }

    if ($request->has("name")) {
      $company->name = $request->input("name");
    }
    if ($request->has("email")) {
      $company->email = $request->input("email");
    }
    if ($request->hasFile("logo")) {
      $imageName = Str::uuid();
      self::imageHandler($request->file("logo"), $imageName, $company->logo);
      $company->logo = $imageName;
    }

    $company->save();

    return [
      "status" => true,
      "message" => "Company saved successfully",
    ];
  }

  public static function destroy($id): array
  {
    $company = Companies::find($id);
    if ($company && $company->logo) {
      Storage::delete("public/img/" . $company->logo);
      Companies::destroy($id);
    }

    return [
      "status" => true,
      "message" => "Company deleted successfully",
    ];
  }

  public static function imageHandler($image, $name, $oldName = null): void
  {
    if ($oldName) {
      Storage::delete("public/img/" . $oldName);
    }
    $imageResize = Image::make($image)->encode();
    Storage::put("public/img/$name", $imageResize);
  }
}
