@extends('layouts.guest')

@section('content')
  @foreach($companies as $item)
    <div class="row m-2 text-center">
      <div class="col-md-6">
        @if($item->logo)
          <img src="{{ $item->logo ? asset("storage/img/".$item->logo) : "#" }}" class="img-fluid rounded-circle" alt="{{ $item->name }}" style="width: 40px">
        @endif
      </div>
      <div class="col-md-6">
        <h3>{{ $item->name }}</h3>
      </div>
    </div>
    <table class="table table-head-fixed text-nowrap">
      <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>Date</th>
      </tr>
      </thead>
      <tbody>
      @if($item->employees->count())
        @foreach($item->employees as $item2)
          <tr>
            <td class="ml-2">{{ $loop->iteration }}.</td>
            <td class="ml-2">{{ $item2->name }}</td>
            <td class="ml-2">{{ $item2->email }}</td>
            <td class="ml-2">{{ \Carbon\Carbon::parse($item2->created_at)->format("d-M-Y") }}</td>
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
  @endforeach
@endsection
