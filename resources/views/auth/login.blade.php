@extends('layouts.app')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}"><b>Rumah Cerdas</b><br>Tirta Cendikia</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Login Untuk Masuk atau klik untuk <a href="{{ url('/register') }}">daftar</a></p>

      <form action="{{ route('login') }}" method="post">
        @csrf

        @if($errors->has('email'))
        <div class="form-group has-error">
          <label>Email</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
          <span class="help-block">{{ $errors->first('email')}}</span>
        </div>
        @else
        <div class="form-group">
          <label>Email</label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
        @endif

        @if($errors->has('password'))
        <div class="form-group has-error">
          <label>Password</label>
          <input id="password" type="password" class="form-control" name="password">
          <span class="help-block">{{ $errors->first('password')}}</span>
        </div>
        @else
        <div class="form-group">
          <label>Password</label>
          <input id="password" type="password" class="form-control" name="password">
        </div>
        @endif
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
@endsection