<!DOCTYPE html>
  <html lang="en">
      @include('template.admin.metadata')
      @yield('css')
  <body>
  <div class="container-scroller">
      @include('template.admin.header')
    <div class="container-fluid page-body-wrapper">
        @include('template.admin.asside')
      <div class="main-panel">
        <div class="content-wrapper">
            @include('template.admin.breadcumb')
            @yield('content')
        </div>
        <footer class="footer">
            @include('template.admin.footer')
        </footer>
      </div>
    </div>
  </div>
  @include('template.admin.scripts')
  @yield('scripts')

  </body>

  </html>
