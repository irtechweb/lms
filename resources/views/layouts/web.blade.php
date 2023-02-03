<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  @include('includes.web.head')
</head>

<body class="">
	<div class="loaderImage"></div>
  @yield('content')   
  @include('includes.web.footer')
  @include('includes.web.script')
  
</body>

</html>