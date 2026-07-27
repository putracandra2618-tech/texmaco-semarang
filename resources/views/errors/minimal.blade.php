<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style> --}}
   <!-- plugins:css -->
   <link rel="shortcut icon" href="{{asset('assets/admin/images/'.\Smt\Masterweb\Models\Option::first()->favicon)}}"/>
   <link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/font-awesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.addons.css')}}">
   
   <!-- endinject -->
   <!-- plugin css for this page -->
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/images/favicon.png')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/admin/vendors/summernote/dist/summernote-bs4.css')}}">
   <!-- plugins:js -->
    <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/admin/js/off-canvas.js')}}"></script>
    <script src="{{ asset('assets/admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('assets/admin/js/misc.js')}}"></script>
    <script src="{{ asset('assets/admin/js/settings.js')}}"></script>

    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
              <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
                <div class="row flex-grow">
                  <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                      <div class="col-lg-6 text-lg-right pr-lg-4">
                        <h1 class="display-1 mb-0">@yield('code')</h1>
                      </div>
                      <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                        <h2>@yield('title_error')</h2>
                        <h3 class="font-weight-light">@yield('desc_error')</h3>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12 text-center mt-xl-2">
                        <a class="text-white font-weight-medium" href="/">Kembali ke halaman utama</a>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12 mt-xl-2">
                        <p class="text-white font-weight-medium text-center">SMK Texmaco Semarang &copy; {{ date('Y') }} | Hak cipta dilindungi undang-undang</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        
                {{-- @yield('code') --}}
    </body>
</html>
