<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hacker Forum</title>
	<link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/pickout.css">
  <link rel="stylesheet" href="/css/pk-cricket.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<script   src="https://code.jquery.com/jquery-3.1.1.js"   integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   crossorigin="anonymous"></script>

<body>
<div class="top-bar">
  
    <div class="slogan">Your Questions Answered!</div>

</div>

	<nav class="navbar-inverse navbar-blue">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">CoDe <span class="large-r">Q</span>and<span class="large-r">A</span></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        @if (Auth::user())
        	<ul class="nav navbar-nav">
            <li id="navForum"><a href="/discuss">Forum</a></li>
            <li id="navRegister"><a href="/home">Home</a></li>
            <li id="navLogin"><a href="/logout">Logout</a></li>
          </ul>
        @endif
        @if (! Auth::user())
          <ul class="nav navbar-nav">
            <li id="navForum"><a href="/discuss">Forum</a></li>
            <li id="navRegister"><a href="/register">Register</a></li>
            <li id="navLogin"><a href="/login">Login</a></li>
          </ul>
        @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>

@include('partials.folder-style-navigation')
	
	<div class="container">

@yield('content')

  </div>

    <script src="/js/main.js"></script>
    <script src="/js/bootstrap.js"></script>

</body>
</html>