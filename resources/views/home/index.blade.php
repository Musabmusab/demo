<!DOCTYPE html>
<html>
<head>
    @includeIf('home.css')
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
@includeIf('home.header')
    </header>
    <!-- end header section -->
    <!-- slider section -->
@include('home.slider')
 <!-- end slider section -->
  <!-- end hero area -->
  <!-- shop section -->
@include('home.shop')
  <!-- end shop section -->
 <!-- info section -->
@include('home.footer')
</body>
</html>
