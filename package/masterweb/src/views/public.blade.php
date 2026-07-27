<!DOCTYPE html>
<html lang="en">
@include('masterweb::template/public/metadata')
@yield('css')

<style>
    .goog-te-gadget {
        display: none !important;
    }
    
    .skiptranslate {
        display: none !important;
    }
    
    .goog-te-banner-frame.skiptranslate {
        opacity: 0 !important;
        pointer-events: none !important;
        height: 0 !important;
    }
    
    body {
        top: 0px !important;
    }
    
    .goog-te-banner {
        display: none !important;
    }
</style>

<body>
    <!-- LOADER -->
    <div class="loading-screen" id="loading-screen">
        <div class="spinner-container">
            <img src="{{asset('assets/public/images/logo/logo-loading.png')}}">
            <div class="spinner"></div>
          </div>
          <p class="text-center" style="line-height: 30px;font-size:18px">Selamat Datang di Website Resmi</p>
          <h1 class="text-center bold color-white" style="margin: 0px">SMK TEXMACO SEMARANG</h1>
        {{--  <img src="{{asset('assets/public/images/logo/LOGO SMT New White.png')}}" class="opc-img" alt="">
        <h3 class="mb-10"><span class="opt-font text-center">www.sevenmediatech.co.id</span></h3>  --}}
    </div>
    <div id="google_translate_element" style="display:none;"></div>
    <div id="wrap" class="boxed ">
        <div class="grey-bg">
            <!-- Grey BG  -->
            @include('masterweb::template.public.header')

            @foreach (unserialize($page->layout) as $column => $module)
            @include('masterweb::module.admin.layoutmodule.column_modules',['column'=> $column,'modules'=>$module])
            @endforeach

            @include('masterweb::template.public.footer')
            <!-- BACK TO TOP -->
            <p id="back-top">
                <a href="#top" title="Back to Top"><span class="icon icon-arrows-up"></span></a>
            </p>

        </div><!-- End BG -->
    </div><!-- End wrap -->

    <!-- JS begin -->
    <script>
        function closeLoadingScreen(loadingScreen) {
            loadingScreen.style.transitionDuration = ".5s";
            loadingScreen.style.transitionTimingFunction = "cubic-bezier(0,.75,.25,1)";
            loadingScreen.style.opacity = 0;
            loadingScreen.style.borderRadius = "40px";
            loadingScreen.style.transform = "scale(0.75)";
            loadingScreen.style.cursor = "initial";
            setTimeout(() => {
              loadingScreen.parentNode.removeChild(loadingScreen);
            }, 500)
          }
          
          document.body.onload = ()=>{
            lscreen = document.getElementById("loading-screen");
            
            // load any data and call the function "closeLoadingScreen(lscreen)"
          
            setTimeout(()=>{closeLoadingScreen(lscreen)}, 1000); // FOR DEMO
          }
    </script>
    @include('masterweb::template.public.js')
    @yield('js')
    
    <script>
        function changeLanguage(language) {
            var selectElement = document.querySelector(".goog-te-combo");
            selectElement.value = language;  
            selectElement.dispatchEvent(new Event('change')); 
        }
    </script>
</body>
</html>