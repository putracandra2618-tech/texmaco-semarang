<!DOCTYPE html>
  <html lang="en">
      @include('masterweb::template.admin.metadata')
      @yield('css')
  <body>
  <div class="container-scroller">
      @include('masterweb::template.admin.header')
    <div class="container-fluid page-body-wrapper">
        @include('masterweb::template.admin.asside')
      <div class="main-panel">
        <div class="content-wrapper">
            @include('masterweb::template.admin.breadcumb')
            @yield('content')
        </div>
        <footer class="footer">
            @include('masterweb::template.admin.footer')
        </footer>
      </div>
    </div>
  </div>
  @include('masterweb::template.admin.scripts')
  @yield('scripts')

  </body>

  </html>
