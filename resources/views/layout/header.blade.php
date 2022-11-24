<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sticky Header CSS Transition</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<header>
    <h1>Sticky Header Pow!</h1>
    <nav>
      <a href="<?php echo url('page1');?>">Home</a>
      <a href="">About</a>
      <a href="">Gallery</a>
      <a href="<?php echo url('page2');?>">Photo</a>
    </nav>
  </header>

</body>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="{{ asset('js/header.js') }}"></script>

</body>
</html>
