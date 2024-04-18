<!doctype html>
<html lang="en">
  @include('includes.header')
  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
        @include('includes.sidebar')
        <div class="body-wrapper">
          @include('includes.topbar')
          @yield('content')
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4"><a href="https://aml.fastevalbpe.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AML@2023</a></p>
          </div>
        </div>
    </div>
    @include('includes.footer')
    @stack('scripts')
  </body>
</html>