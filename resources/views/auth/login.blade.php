@extends('auth.main')

@section('header')

@endsection

@section('container')
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="assets/images/ganteng.jpg" alt="looginpage"></div>
          <div class="col-xl-5 p-0">

            <div class="login-card">

              <form class="theme-form login-form needs-validation" novalidate="" method="POST" action="{{ route('login.custom') }}">
                @csrf
                <h4>Login</h4>
                <h6>Selamat datang kembali! Silahkan masuk.</h6>
                <div class="form-group">
                  <label>Alamat Email</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" id="email" required="" placeholder="contoh@gmail.com" name="email" required autofocus>
                  </div>
                  @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                  @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Masu ke Panel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('footer')

@endsection
