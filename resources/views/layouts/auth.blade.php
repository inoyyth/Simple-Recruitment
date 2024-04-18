<!doctype html>
<html lang="en">
  @include('includes.header')
  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
        @yield('content')
    </div>
    @include('includes.footer')
    @stack('scripts')
  </body>
</html>