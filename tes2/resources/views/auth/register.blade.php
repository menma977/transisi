@extends('layouts.guest')

@section('meta')
  <meta name="description" content="Join P@NTASTIS{{ $sponsor ? " from $sponsor network" : '' }} and grow together with us.">

  <meta property="og:url" content="{{ url("register", $sponsor ?? null) }}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="P@NTAStis">
  <meta property="og:description" content="Join P@NTASTIS{{ $sponsor ? " from $sponsor network" : '' }} and grow together with us.">
  <meta property="og:image" content="{{ asset('images/hero-min.png') }}">

  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="pantastis.com">
  <meta property="twitter:url" content="{{ url("register", $sponsor ?? null) }}">
  <meta name="twitter:title" content="P@NTAStis">
  <meta name="twitter:description" content="Join P@NTASTIS{{ $sponsor ? " from $sponsor network" : '' }} and grow together with us.">
  <meta name="twitter:image" content="{{ asset('images/hero-min.png') }}">
@endsection

@section('content')
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1">
          <strong class="text-primary">P<strong class="text-danger">@</strong>NTAS<small class="text-danger"><span
                  style="text-decoration:overline">tis</span></small>
          </strong>
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg text-navy">Register as Our Member</p>

        <form action="{{ route('register', '') }}" class="row justify-content-center" method="post">
          @csrf
          <div class="col-md-6">
            <div class="mb-3">
              <div class="col-12 card mb-2">
                <div class="card-body">
                  <h5 class="card-title mb-3 text-dark">Sponsor</h5>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('sponsor') is-invalid @enderror"
                           placeholder="Sponsor" name="sponsor" value="{{ $sponsor }}" readonly>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-users"></span>
                      </div>
                    </div>
                  </div>
                  <p class="text-gray">Position</p>
                  <div class="d-flex">
                    <div class="form-group mx-2">
                      <div class="icheck-primary d-inline">
                        <input id="left-pos" type="radio" name="position" value="1">
                        <label for="left-pos" class="text-navy">
                          Left
                        </label>
                      </div>
                    </div>
                    <div class="form-group mx-2">
                      <div class="icheck-primary d-inline">
                        <input id="right-pos" type="radio" name="position" value="2">
                        <label for="right-pos" class="text-navy">
                          Right
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 card">
                <div class="card-body">
                  <h5 class="card-title mb-3 text-dark">Bank Information</h5>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('bank') is-invalid @enderror"
                           placeholder="Bank Name" name="bank" value="{{ @old('bank') }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-university"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control @error('bank_account') is-invalid @enderror"
                           placeholder="Bank Account" name="bank_account"
                           value="{{ @old('bank_account') }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-file-invoice"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title mb-3 text-dark">Registration Form</h5>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('name') is-invalid @enderror"
                         placeholder="Full name" name="name" value="{{ @old('name') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('username') is-invalid @enderror"
                         placeholder="Username" name="username" value="{{ @old('username') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror"
                         placeholder="Email" name="email" value="{{ @old('email') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                         placeholder="Password" name="password" value="{{ @old('password') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Retype password"
                         name="password_confirmation">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('unique') is-invalid @enderror"
                         placeholder="Identity Number" name="unique" value="{{ @old('unique') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-id-card"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 ">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title mb-3 text-dark">Address</h5>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('address') is-invalid @enderror"
                         placeholder="Address" name="address" value="{{ @old('address') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('city') is-invalid @enderror"
                         placeholder="City" name="city" value="{{ @old('city') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('province') is-invalid @enderror"
                         placeholder="Province" name="province" value="{{ @old('province') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('postal') is-invalid @enderror"
                         placeholder="Postal" name="postal" value="{{ @old('postal') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-map-marker-alt"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row w-100">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">I've become a member</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
@endsection

@section('addCss')
  <style>
      .input-group-text span.fas,
      .input-group-text span.fab {
          width: 1.5rem
      }

      .register-box {
          width: 360px;
      }

      @media only screen and (min-device-width: 720px) {
          .register-box {
              width: 720px;
          }
      }

  </style>
@endsection
