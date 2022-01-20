@extends('layouts.app')

@section('title')
  <div class="col-sm-6">
    <h1 class="m-0">
      <i class="fas fa-home"></i>
      Home
    </h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Home</li>
    </ol>
  </div>
@endsection

@section('content')
  <div class="col-md-12">
    <h6 class="mb-4">php <strong class="text-warning">artisan storage:link</strong> before add new companies</h6>
  </div>
  <div class="col-md-6 mb-4">
    <a href="{{ route("pdf") }}">
      <button type="button" class="btn btn-block btn-primary">Export company to PDF</button>
    </a>
  </div>
  <div class="col-md-6 mb-4">
    <a href="{{ route("export.excel") }}">
      <button type="button" class="btn btn-block btn-primary">Export company to EXCEL</button>
    </a>
  </div>

  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Import Excel
        </h3>
      </div>
      <form action="{{ route("import.excel") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="_excel">Excel</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="_excel" name="excel">
                <label class="custom-file-label" for="_excel">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-block btn-primary">Import</button>
        </div>
      </form>
    </div>
  </div>
@endsection
