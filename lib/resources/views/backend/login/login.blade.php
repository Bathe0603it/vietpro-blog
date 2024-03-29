<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="{{asset('public/Layout/backend')}}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Đăng nhập | Vietpro Blog</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading text-center">Đăng Nhập</h2>
        @include('errors.alert')

        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Tài khoản" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mật khẩu" required>
        </div>
        {{csrf_field()}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <div class="form-group"></div>
      </form>
    </div>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
