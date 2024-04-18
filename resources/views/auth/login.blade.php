@extends('layouts.auth')
@section('content')
<div
  class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
  <div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-8 col-lg-6 col-xxl-3">
      @if ($errors->has('error_auth'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <strong>Gagal!</strong> {{ $errors->first('error_auth') }}.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card mb-0">
          <div class="card-body">
            <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
              <img src="https://www.humanindo.co.id/assets/images/logo.png" style="width:100%;" alt="">
            </a>
            <form action="{{ route('auth.verified') }}" method="post">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Login">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection