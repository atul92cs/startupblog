<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Startup Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">AboutUs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Stories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ContactUs</a>
      </li>
    </ul>
     </div>
</nav>

    @yield('content')
    <footer id="footer">
    <div class="footer-row">
        <div class="footer-column">
          <p class="lead">
          &copy; Startup Blog
          </p>
        </div>
        <div class="footer-column" id="social">
          <h5>Follow Us</h5>
          <div class="social-media">
            <div>
              <img src="{{asset('images/facebook.png')}}" alt="">
            </div>
            <div>
              <img src="{{asset('images/twitter.png')}}" alt="">
            </div>
            <div>
              <img src="{{asset('images/instagram.png')}}" alt="">
            </div>
          </div>
        </div>
        <div class="footer-column">
          <h5>Made By </h5>
        </div>
    </div>
    </footer>

    <script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>        
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/type-writer.js')}}"></script> 
</body>
</html>