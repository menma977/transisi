@extends('layouts.app')

@section('title')
  <div class="col-sm-6">
    <h1 class="m-0">
      <i class="fas fa-home"></i>
      Employee
    </h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route("home") }}">Home</a></li>
      <li class="breadcrumb-item active">Employee</li>
    </ol>
  </div>
@endsection

@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Employee List
        </h3>
      </div>
      <div class="card-body">
        <a href="{{ route("employee.create") }}">
          <button type="button" class="btn bg-gradient-primary float-right mb-4">Add new Employee</button>
        </a>
        <div class="table-responsive" style="max-height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
              <th>#</th>
              <th>name</th>
              <th>email</th>
              <th>company</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($employees->count())
              @foreach($employees as $item)
                <tr>
                  <td>{{ ($employees->currentpage() - 1) * $employees->perpage() + $loop->index + 1 }}.</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{  $item->company->name ?? "-" }}</td>
                  <td>{{ $item->created_at->diffForHumans() }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route("employee.edit", $item->id) }}" class="btn btn-warning">
                        Edit
                      </a>
                      <a href="{{ route("employee.delete", $item->id) }}" class="btn btn-danger">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="65" class="text-center text-muted">
                  No data
                </td>
              </tr>
            @endif
            </tbody>
          </table>
        </div>
        @if($employees->hasPages())
          <div class="mb-3">
            {{ $employees->onEachSide(5)->links() }}
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
