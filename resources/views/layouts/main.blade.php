<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PhotoGallery | Welcome</title>
<link rel="stylesheet" href="/css/foundation.css">
<link rel="stylesheet" href="/css/app.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel='stylesheet' type='text/css'>
 
</head>
<body>
 
<a href="http://zurb.com/article/1470/the-new-foundation-docs-learn-your-way" class="docs-banner grid-banner">
<div class="info row">
<!-- <h5 class="columns small-10 small-centered"><strong>✨ Meet the New Foundation Docs: 3 Ways to Learn ✨</strong></h5> -->
</div>
</a>
 
<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-2195009-2', 'auto');
      ga('send', 'pageview');

      ga('create', 'UA-2195009-27', 'auto', {name: "foundation"});
      ga('foundation.send', 'pageview');

    </script>
<div class="off-canvas-wrapper">
<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left">
<div class="row column">
<br>
<h5>Main Menu</h5>
<ul class="side-nav">
  <li><a href="/">home</a></li>
  <?php  if(!Auth::check()) : ?>
  <li><a href="/login">login</a></li>
  <li><a href="/register">register</a></li>
  <?php endif; ?>
  <?php  if(Auth::check()) : ?>
      <li><a href="/gallery/create">create gallery</a></li>
  <li><a href="/logout">Logout</a></li>
  <?php endif; ?>


</ul>
</div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-open="my-info"></button>
<span class="title-bar-title">HAHAHAHA</span>
</div>
</div>
@if(Session::has('message'))
<div data-alert class="alert-box">
  {{Session::get('message')}}
</div>
@endif
@yield('content');
<hr>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="/js/vendor/foundation.js"></script>
<script src="/js/app.js"></script><script>
      $(document).foundation();
    </script>
</body>
</html>
 