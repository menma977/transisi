@extends('layouts.app')

@section('title')
  <div class="col-sm-6">
    <h1 class="m-0">
      <i class="fas fa-home"></i>
      Companies
    </h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ Route("home") }}">Home</a></li>
      <li class="breadcrumb-item active">company</li>
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
      <div class="card-body">
        <a href="{{ route("company.create") }}">
          <button type="button" class="btn bg-gradient-primary float-right mb-4">Add new company</button>
        </a>
        <div class="table-responsive" style="max-height: 400px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
              <th>#</th>
              <th>logo</th>
              <th>name</th>
              <th>email</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($companies->count())
              @foreach($companies as $item)
                <tr>
                  <td>{{ ($companies->currentpage() - 1) * $companies->perpage() + $loop->index + 1 }}.</td>
                  <td style="width: 45px">
                    <img src="{{ $item->logo ? asset("storage/img/".$item->logo) : "#" }}" class="img-fluid rounded-circle" alt="{{ $item->name }}">
                  </td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->created_at->diffForHumans() }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route("company.pdf", $item->id) }}" class="btn btn-info">
                        PDF
                      </a>
                      <a href="{{ route("company.edit", $item->id) }}" class="btn btn-warning">
                        Edit
                      </a>
                      <a href="{{ route("company.delete", $item->id) }}" class="btn btn-danger">
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
        @if($companies->hasPages())
          <div class="mb-3">
            {{ $companies->onEachSide(5)->links() }}
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
