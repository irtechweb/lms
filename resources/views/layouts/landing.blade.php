<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  @include('includes.landing.head')
</head>

<body class="">
	<div class="loaderImage"></div>
  @include('includes.landing.header')
  @yield('content')   
 
  @include('includes.landing.footer')
  @include('includes.landing.script')
  @yield('scripts')
</body>

</html>