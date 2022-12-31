<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

<div class="navbar">
  <a href="/index"><img src="assets/gambar/navbar.png" alt="Avatar"></a>
  <a href="#news"><b>How It's Work</b></a>
  <a href="#contact"><b>Contact</b></a>
  @if(Auth::check())
  <a href="/dashboard"><b>{{Auth::user()->name}} Dashboard</b></a>
  <a href="/post"><b>Post an Ads</b></a>
  @else
  <a href="/login"><b>Login</b></a>
  <a href="/register"><b>Register</b></a>
  @endif
</div>


{{--start content--}}
        @yield('content')
    {{--end content--}}
<div class="footers">
    <div class="footer">
      <div class="logo">
        <img src="assets/gambar/navbar.png" alt="Avatar">
      </div>
      <p>Handshare is a place to report or retrieve a lost item. Everyone can find their lost item back.</p>
      <div class="socialmedia">
      <i class="fa fa-instagram"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-facebook-square"></i>
      <i class="fa fa-pinterest-square"></i>
    </div>
    </div>
    <div class="footer">
      <div align="center">
        <p>© 2021 HandShare. All rights reserved.</p>
      </div>
  </div>
  <div class="footer">
    <div>
      <b>Develop By</b>
    </div>
    <p>Fakhri Az</p>
</div>
</body>


</html>