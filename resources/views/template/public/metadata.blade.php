@php
$option = \App\Models\Option::first();
@endphp

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="robots" content="index, follow">
    <meta name="author" content="Seven Media Technology">
    <meta name="copyright" content="Seven Media Technology" />
    <meta name="rating" content="general" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="msnbot" content="index, follow" />
    <meta name="yahoobot" content="index, follow" />
    <meta name="bingbot" content="index, follow" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ ($option->favicon == "") ? asset('assets/public/images/favicon/favicon.png') : asset('assets/admin/images/'.$option->favicon)}}">
    <!-- FLEXSLIDER SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/public/css/flexslider.css')}}">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('assets/public/css/bootstrap.min.css')}}">
     
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,600,300%7COpen+Sans:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- ICONS ELEGANT FONT & FONT AWESOME & LINEA ICONS -->
    <link rel="stylesheet" href="{{ asset('assets/public/css/icons-fonts.css')}}">

    <!-- CSS THEME -->
    <link rel="stylesheet" href="{{ asset('assets/public/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/public/css/custom.css')}}">

    <!-- ANIMATE -->
    <link rel='stylesheet' href="{{ asset('assets/public/css/animate.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/public/rs-plugin/css/settings.min.css') }}" media="screen" />
    
    {{-- PROPERTY --}}
    <meta property="og:title" content="{{(request()->segment(1) != NULL) ? SmtHelp::get_linkname()." - " : ""}}{{$option->title}}" />
    <meta property="og:url" content="{{request()->fullUrl()}}" />
    <meta property="og:description" content="{{$option->description}}"> 


    <!-- S:fb meta -->
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="{{request()->url()}}" />
    <!-- e:fb meta -->

    <!-- S:tweeter card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{$option->keyword}} - {{$option->title}}" />
    <meta name="twitter:description" content="{{$option->title}} - {{$option->keyword}}" />
    
    <!-- jQuery  -->
    <script type="text/javascript" src="{{ asset('assets/public/js/jquery-1.11.2.min.js')}}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/public/js/jquery.form.js')}}"></script> --}}
    
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'id', 
          autoDisplay: false
        }, 'google_translate_element');
      }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    {!!$option->script_option!!}


    <!-- E:tweeter card -->
    @php
        //set artikel
        $title = (request()->segment(1) != NULL) ? SmtHelp::get_linkname() : "";

        $get_artikel = NULL;
    @endphp
    {{-- type artikel --}}
    @if (SmtHelp::get_type() == "2" OR SmtHelp::get_type() == "18")  
        @if(request()->segment(2) != NULL)
            @php
                $menu_id = SmtHelp::get_menuid();
                $linkmenu = SmtHelp::get_linkmenu();
                $link = request()->segment(3);
                $get_artikel = \App\Models\Content::where('link_url',$link)->first();
                $title = $get_artikel->title;
            @endphp
        @endif
    @endif

    <title>{{$title}}{{(request()->segment(1) != NULL) ? " - " : ""}}{{$option->title." - ".$option->slogan}}</title>

    @if ($get_artikel == NULL)
        <meta property="og:image" content="{{ ($option->favicon == "") ? asset('assets/public/images/favicon/favicon.png') : asset('assets/admin/images/'.$option->favicon)}}">
        <meta name="twitter:image" content="{{ ($option->favicon == "") ? asset('assets/public/images/favicon/favicon.png') : asset('assets/admin/images/'.$option->favicon)}}" />
        <meta property="og:image" content="{{ ($option->favicon == "") ? asset('assets/public/images/favicon/favicon.png') : asset('assets/admin/images/'.$option->favicon)}}" />
        <meta name="description" content="{{$option->description}}">
        <meta name="keywords" content="{{$option->keyword}}">
    @else
        <meta property="og:image" content="{{asset('assets/public/images/'.$get_artikel->img_thumbnail)}}">
        <meta name="twitter:image" content="{{asset('assets/public/images/'.$get_artikel->img_thumbnail)}}" />
        <meta property="og:image" content="{{asset('assets/public/images/'.$get_artikel->img_thumbnail)}}" />
        <meta name="description" content="{{strip_tags($get_artikel->deskripsi)}}">
        <meta name="keywords" content="{{$get_artikel->keyword}}">
    @endif

    @yield('css')
    
</head>