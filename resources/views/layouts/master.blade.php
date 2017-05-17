<html>
<head>

  @include('includes.header')
</head>

<body>

 <!-- navbar -->
 @include('includes.navigation')


 <!-- content -->
 @yield('content')



 <footer class="row"> 
  @include('includes.footer')
</footer>

</body>
</html>