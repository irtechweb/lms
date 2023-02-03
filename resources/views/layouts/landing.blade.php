<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  @include('includes.landing.head')
</head>

<body class="">
	<div class="loaderImage"></div>
  @yield('content')   
  @include('includes.landing.footer')
  @include('includes.landing.script')
  
</body>

</html>