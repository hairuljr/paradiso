@extends('layouts.skote')

@section('content')
<div class="account-pages my-5 pt-sm-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
          <div class="bg-primary bg-soft">
            <div class="row">
              <div class="col-7">
                <div class="text-primary p-4">
                  <h5 class="text-primary">Selamat Datang!</h5>
                  <p>Silakan login untuk masuk ke dashboard .</p>
                </div>
              </div>
              <div class="col-5 align-self-end">
                <img src="{{ asset('assets/skote/images/profile-img.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="auth-logo">
              <a href="#" class="auth-logo-light">
                <div class="avatar-md profile-user-wid mb-4">
                  <span class="avatar-title rounded-circle bg-light">
                    <img src="{{ asset('assets/skote/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                  </span>
                </div>
              </a>

              <a href="#" class="auth-logo-dark">
                <div class="avatar-md profile-user-wid mb-4">
                  <span class="avatar-title rounded-circle bg-light">
                    <img src="{{ asset('assets/skote/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                  </span>
                </div>
              </a>
            </div>
            <div class="p-2">
              <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('username') }}" required autocomplete="email">
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <div class="input-group auth-pass-inputgroup">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                {{-- <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-check">
                  <label class="form-check-label" for="remember-check">
                    Remember me
                  </label>
                </div> --}}

                <div class="mt-3 d-grid">
                  <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                </div>

               
              </form>
            </div>

          </div>
        </div>
        <div class="mt-5 text-center">
          <div>
            <p>© {{ date('Y') }} Paradiso. Crafted with <i class="mdi mdi-heart text-danger"></i></p>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
