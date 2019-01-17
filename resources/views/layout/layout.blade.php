<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- 自分のcss -->
    <link rel="stylesheet" href="{{asset('/css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('/css/div.css')}}">

    <title>@yield('title')</title>
    <style>
    .margin{
      margin-left: 270px;
    }
    body{
      overflow: scroll;
    }

    </style>

  </head>

  <body>
    <div id="content" class="container-fluid">

      @yield("content")
    </div>
  </body>
</html>
