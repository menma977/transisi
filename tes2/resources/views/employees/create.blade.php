@extends('layouts.app')

@section("addCss")
  <link href="{{ url("https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css") }}" rel="stylesheet"/>
@endsection

@section('title')
  <div class="col-sm-6">
    <h1 class="m-0">
      <i class="fas fa-home"></i>
      add new Employee
    </h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route("home") }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route("employee.index") }}">Employee</a></li>
      <li class="breadcrumb-item active">add</li>
    </ol>
  </div>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
      <form method="post" action="{{ route("employee.store") }}">
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
            <label for="_companies">Company</label>
            <select class="form-control" id="_companies" name="companies"></select>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section("addJs")
  <script src="{{ url("https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js") }}"></script>
  <script>
    $("#_companies").select2({
      placeholder: "Select a company",
      minimumInputLength: 2,
      multiple: false,
      allowClear: true,
      id: function (item) {
        return item.id;
      },
      ajax: {
        url: "{{ route("company.search") }}",
        dataType: "json",
        delay: 250,
        data: function (params) {
          return {
            term: params.term,
            page: params.page || 1
          };
        },
        cache: true,
      },
    });
  </script>
@endsection