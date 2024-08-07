@extends('layouts.admin.login')

@section('content')
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
    <input type="email" id="email" name="email" for="email" class="form-control form-control-lg" placeholder="Username">
  </div>
  <div class="form-group">
    <input type="password" id="password" name="password" for="password" class="form-control form-control-lg" placeholder="Password">
  </div>
  <div class="mt-3 d-grid gap-2">
    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn">Login</button>
  </div>
</form>

@endsection
