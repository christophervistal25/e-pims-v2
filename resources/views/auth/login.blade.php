<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="robots" content="noindex, nofollow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="apple-touch-icon" sizes="57x57" href="{{  asset('/assets/img/icons/apple-icon-57x57.png') }}">
      <link rel="apple-touch-icon" sizes="60x60" href="{{  asset('/assets/img/icons/apple-icon-60x60.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{  asset('/assets/img/icons/apple-icon-72x72.png') }}">
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/icons/apple-icon-76x76.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{  asset('/assets/img/icons/apple-icon-114x114.png') }}">
      <link rel="apple-touch-icon" sizes="120x120" href="{{  asset('/assets/img/icons/apple-icon-120x120.png') }}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{  asset('/assets/img/icons/apple-icon-144x144.png') }}">
      <link rel="apple-touch-icon" sizes="152x152" href="{{  asset('/assets/img/icons/apple-icon-152x152.png') }}">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/icons/apple-icon-180x180.png') }}">
      <link rel="icon" type="image/png" sizes="192x192" href="{{  asset('/assets/img/icons/android-icon-192x192.png') }}">
      <link rel="icon" type="image/png" sizes="32x32" href="{{  asset('/assets/img/icons/favicon-32x32.png') }}">
      <link rel="icon" type="image/png" sizes="96x96" href="{{  asset('/assets/img/icons/favicon-96x96.png') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/icons/favicon-16x16.png') }}">
      <link rel="manifest" href="{{ asset('/assets/img/icons/manifest.json') }}">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="{{ asset('/assets/img/icons/ms-icon-144x144.png') }}">
      <meta name="theme-color" content="#ffffff">
      <title>Login your account | {{ config('app.name') }}</title>
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
      <style>
            body {
                  font-family: 'Inter', sans-serif;
            }

      </style>
</head>

<body class="account-page">
      <div class="main-wrapper">
            <div class="account-content">
                  <div class="container">
                        <center>
                              <img src="/assets/img/province.png" class="img-fluid mb-3" width="200px">
                        </center>
                        @if($errors->any())
                        <div class='alert alert-danger rounded-0 text-center'>
                              Please check your email/password.
                        </div>
                        @endif
                        <div class="account-box">
                              <div class="account-wrapper">
                                    <h3 class="account-title">{{ config('app.name') }}</h3>
                                    <p class="account-subtitle">Access to our dashboard</p>
                                    <form action="{{ route('submit.login') }}" method="POST">
                                          @csrf
                                          <div class="form-group">
                                                <label>Username</label>
                                                <input autofocus class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" type="text" name="username" value="{{ old('username', 'admin') }}" id="username">
                                          </div>
                                          <div class="form-group">
                                                <div class="row">
                                                      <div class="col">
                                                            <label>Password</label>
                                                      </div>
                                                </div>
                                                <input class="form-control {{ $errors->any() ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="password">
                                          </div>
                                          <div class="form-group text-center">
                                                <button class="btn btn-primary account-btn btn-sm" type="submit">
                                                      <div class="text-sm">
                                                            Login
                                                      </div>
                                                </button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <script src="assets/js/jquery-3.2.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/app.js"></script>
</body>

</html>
