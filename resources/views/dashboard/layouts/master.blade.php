<!DOCTYPE html>
<html lang="en">

  <head>
    @include('dashboard.layouts.header')
  </head>

  <body>
    @include('dashboard.layouts.nav')
    @include('dashboard.layouts.sidebar')
    @yield('content')
    @include('dashboard.layouts.footer')
  </body>

  </html>