@php
$data = DB::table("ms_slideshows")->orderby('order','DESC')->where('publish','1')->whereNull('deleted_at')->get();
@endphp

<div class="relative">
    <div class="rs-fullscr-container">

        <div id="rs-fullwidth" class="tp-banner dark-bg">
            <ul>
                @foreach ($data as $slideshow)       
                <!-- SLIDE 1 -->
                <li data-transition="zoomout" data-slotamount="1" data-masterspeed="1500" data-thumb="images/revo-slider/terka-thumb.jpg" data-saveperformance="on" data-title="HASWELL" class="black-slide">
                    <!-- MAIN IMAGE -->
                
                    <img src="{{asset('assets/public/images/slideshow/'.$slideshow->images)}}" alt="slidebg1" data-lazyload="{{asset('assets/public/images/slideshow/'.$slideshow->images)}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                
                    <!-- LAYERS -->
                
                    <!--PARALLAX & OPACITY container -->
                    {{--  <div class="rs-parallaxlevel-4 opacity-scroll2">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption font-white font-size-32 sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-50" data-speed="500" data-start="850" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1"
                            data-endelementdelay="0.1" style="z-index: 9; max-width: 900px; max-height: auto; white-space: normal;text-align:center !important"><span style="color:#fff !important; letter-spacing:1px !important;text-align:center !important">{{$data['name']}}</span>
                        </div>
                
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption font-white font-size-20 sfb tp-resizeme hide-0-736" data-x="center" data-hoffset="0" data-y="center" data-voffset="25" data-speed="900" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                            data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 9; max-width: 1200px; max-height: auto; white-space: normal;text-align:center !important"><span style="color:#fff !important; letter-spacing:1px !important;text-align:center !important">{{$data['deskripsi']}}</span>
                        </div>
                
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption center-0-478 sfb" style="margin-top: -100px" data-x="center" data-hoffset="0" data-y="center" data-voffset="115" data-speed="900" data-start="1350" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><a class="button large thin hover-dark tp-button white" href="{{$data['url']}}">SELENGKAPNYA</a>
                        </div>
                
                    </div>  --}}
                </li>
                @endforeach
            </ul>

        </div>

    </div>

</div>