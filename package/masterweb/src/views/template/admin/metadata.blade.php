@php
    $opt = DB::table('ms_options')->first();
@endphp
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title') @if (trim($__env->yieldContent('title'))) - @endif {{ $opt->title }}</title>
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
        <style>
        @font-face {
            font-family: 'gotham-light';
            src: url({{asset("assets/public/fonts/gotham/Gotham-Light.otf")}});
        }
        @font-face {
            font-family: 'gotham-medium';
            src: url({{asset("assets/public/fonts/gotham/Gotham-Medium.otf")}});
        }
        @font-face {
            font-family: 'gotham-thin';
            src: url({{asset("assets/public/fonts/gotham/Gotham-Thin.otf")}});
        }
        @font-face {
            font-family: 'gotham-ultra';
            src: url({{asset("assets/public/fonts/gotham/Gotham-Ultra.otf")}});
        }
        @font-face {
            font-family: 'gotham-narrow-black';
            src: url({{asset("assets/public/fonts/gotham/GothamNarrow-Black.otf")}});
        }
        @font-face {
            font-family: 'gothamnarrow-book';
            src: url({{asset("assets/public/fonts/gotham/GothamNarrow-Book.otf")}});
        }
        @font-face {
            font-family: 'gotham-narrow-thin';
            src: url({{asset("assets/public/fonts/gotham/GothamNarrow-Thin.otf")}});
        }
        @font-face {
            font-family: 'gotham-narrow-ultra';
            src: url({{asset("assets/public/fonts/gotham/GothamNarrow-Ultra.otf")}});
        }
        
    </style>

        <script src='https://www.google.com/recaptcha/api.js'></script>

        {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />  --}}
        
      </head>