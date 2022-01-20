@extends('layouts.app')

@section('title')
  <div class="col-sm-6">
    <h1 class="m-0">
      <i class="fas fa-home"></i>
      add new Companies
    </h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route("home") }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route("company.index") }}">company</a></li>
      <li class="breadcrumb-item active">add</li>
    </ol>
  </div>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Company List
        </h3>
      </div>
      <form method="post" action="{{ route("company.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="_name">Name</label>
            <input type="text" class="form-control" id="_name" name="name" placeholder="Enter name" value="{{ old("name") }}">
          </div>
          <div class="form-group">
            <label for="_email">Email address</label>
            <input type="email" class="form-control" id="_email" name="email" placeholder="Enter email" value="{{ old("email") }}">
          </div>
          <div class="form-group">
            <label for="_logo">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="_logo" name="logo">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection
