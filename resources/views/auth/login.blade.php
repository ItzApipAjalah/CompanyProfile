@extends('layouts.admin.login')

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
      <div class="brand-logo">
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
      </div>
      <h4>Hello! Let's get started</h4>
      <h6 class="fw-light">Sign in to continue.</h6>
      @if ($errors->any())
      <div class="error-message">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form class="pt-3" method="POST" action="{{ route('login') }}">
          @csrf
        <div class="form-group">
          <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password">
        </div>
        <div class="mt-3 d-grid gap-2">
          <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Login</button>
        </div>
      </form>
      <div class="mt-3 text-center">
        <a href="{{ route('admin.password.request') }}" class="text-primary">Forgot Password?</a>
      </div>
    </div>
  </div>
@endsection
