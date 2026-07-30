@php
//get data option website
$option = \App\Models\Option::first();
$contact = \App\Models\Contact::first();
//function sub menu
function re_menu($id)
{
$subnav = \App\Models\Menu::where('publish','1')->where('upmenu',$id)->orderby('order')->get();
if (count($subnav)>0) {
@endphp
<ul class="sub">
    <?php foreach ($subnav as $sub_nav) { ?>
        @if($sub_nav->type_link=="1")
            <li><a href="{{ $sub_nav->link }}" title="{{ $sub_nav->name }}" target="_blank">{{ strtoupper($sub_nav->name) }}</a></li>
        @else
            <li><a href="/{{ $sub_nav->link }}" title="{{ $sub_nav->name }}">{{ strtoupper($sub_nav->name) }}</a></li>
        @endif
     
    <?php } ?>
</ul>
@php

}
}
@endphp
<header id="nav" class="header header-1 no-transparent mobile-no-transparent affix-top">
    <div class="top-bar">
        <div class="container-m-30 clearfix">
          
          <!-- LEFT SECTION -->
          <ul class="top-bar-section left">
            <li><a href="https://www.google.com/maps/place/SMK+Texmaco+Semarang/@-7.0072944,110.3904599,15z/data=!4m5!3m4!1s0x2e705fe9c70586e9:0x76accfa1f41ef8ca!8m2!3d-6.9714043!4d110.2932415" target="_blank" class="color-white font-w-500"><i class="fa fa-map-marker"></i> &nbsp; Jl. Raya Mangkang KM 16, Semarang 50155</a></li>
            <li><a href="mailto:{{$contact->email}}" target="_blank" class="color-white font-w-500"><i class="fa fa-envelope"></i>&nbsp;  {{$contact->email}}</a></li>
          </ul>
          
          <!-- RIGHT SECTION -->
          <ul class="top-bar-section right">
                <li><a href="https://www.instagram.com/smktexmacosemarang/" target="_blank" title="Instagram" class="color-white font-w-500"><i class="fa fa-instagram"></i>&nbsp; smktexmacosemarang</a></li>
                <li><a href="https://www.youtube.com/channel/UCqkCTDH7gR2IdtrQBFcGhGA" target="_blank" title="Youtube" class="color-white font-w-500"><i class="fa fa-youtube-play"></i>&nbsp; SMK Texmaco Semarang</a></li>
                
                <li class="dropdown">
                    <a href="#" class="color-white font-w-500" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                        <i class="fa fa-language"></i>&nbsp; PILIH BAHASA <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown" style="background-color: #333; padding: 10px; border-radius: 8px; border: 1px solid #444; left: 0;">
                        <li>
                            <a href="#" class="color-white" data-lang="id"
                               style="color: white; padding: 10px; display: flex; align-items: center; border-radius: 5px;"
                               onmouseover="this.style.backgroundColor='#555'; this.style.color='white';"
                               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';"
                               onclick="changeLanguage('id')">
                                <img src="{{ asset('assets/public/images/indonesia.png') }}" alt="Indonesia Flag" style="width: 20px; margin-right: 10px;"> Indonesia
                            </a>
                        </li>
                        <li>
                            <a href="#" class="color-white" data-lang="en"
                               style="color: white; padding: 10px; display: flex; align-items: center; border-radius: 5px;"
                               onmouseover="this.style.backgroundColor='#555'; this.style.color='white';"
                               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';"
                               onclick="changeLanguage('en')">
                                <img src="{{ asset('assets/public/images/ingris.png') }}" alt="UK Flag" style="width: 20px; margin-right: 10px;"> English
                            </a>
                        </li>
                        <li>
                            <a href="#" class="color-white" data-lang="zh-CN"
                               style="color: white; padding: 10px; display: flex; align-items: center; border-radius: 5px;"
                               onmouseover="this.style.backgroundColor='#555'; this.style.color='white';"
                               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';"
                               onclick="changeLanguage('zh-CN')">
                                <img src="{{ asset('assets/public/images/china.png') }}" alt="China Flag" style="width: 20px; margin-right: 10px;"> 中文 (Chinese)
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </div>
      </div>
    <div class="header-wrapper">
        <div class="container-m-30 clearfix">
            <div class="logo-row">

                <!-- LOGO -->
                <div class="logo-container-2">
                    <div class="logo-2">
                        <a href="/beranda" class="clearfix">
                            <img src="{{ ($option->logo == NULL) ? asset('assets/public/images/logo/favicon.png') : asset('assets/public/images/logo/'.$option->logo)}}" class="logo-img" alt="Logo">
                        </a>
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="menu-btn-respons-container">
                    <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target="#main-menu .navbar-collapse">
                        <span aria-hidden="true" class="icon_menu hamb-mob-icon"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- MAIN MENU CONTAINER -->
        <div class="main-menu-container">

            <div class="">

                <!-- MAIN MENU -->
                <div id="main-menu" class="font-poppins">
                    <div class="navbar navbar-default" role="navigation">

                        <!-- MAIN MENU LIST -->
                        <nav class="collapse collapsing navbar-collapse right-1024">
                            <ul class="nav navbar-nav">

                                @php
                                //get data navigation
                                $nav = \App\Models\Menu::where('publish','1')->where('upmenu','0')->orderby('order')->get();

                                foreach ($nav as $nav_menu) {

                                $subnav = \App\Models\Menu::where('publish','1')->where('upmenu',$nav_menu->id)->orderby('order')->get();
                                if (count($subnav)>0) {
                                $sbb = "parent";
                                } else {
                                $sbb = "";
                                }

                                @endphp
                                <li class="<?= $sbb; ?><?= Request::segment(1) == $nav_menu->link ? "current" : NULL ?>">
                                    @if($nav_menu->type_link=="1")
                                    <a href="{{ $nav_menu->link }}" class="main-menu-title" title="{{ $nav_menu->name }}" target="_blank"><span id="{{ $nav_menu->link }}">{{ strtoupper($nav_menu->name) }} {!!$sbb == "parent" ? "<i class='fa fa-chevron-down'></i>" : ""!!}</span></a>
                                    @else
                                    <a href="/{{ $nav_menu->link }}" class="main-menu-title" title="{{ $nav_menu->name }}"><span id="{{ $nav_menu->link }}">{{ strtoupper($nav_menu->name) }} {!!$sbb == "parent" ? "<i class='fa fa-chevron-down'></i>" : ""!!}</span></a>
                                    @endif
                                    @php
                                        //calll function sub menu
                                        re_menu($nav_menu->id)
                                    @endphp
                                </li>
                                @php

                                }
                                @endphp

                            </ul>

                        </nav>

                    </div>
                </div>
                <!-- END main-menu -->
                
                <ul class="cd-header-buttons">
                    <li>
                        <a href="https://spmb.yayasanppittexmaco.or.id/" target="_blank" class="main-menu-title" title="PPDB"><span id="penawaran">PPDB</span></a>
                    </li>
                </ul> <!-- cd-header-buttons -->
                @php
                $linkSearch = SmtHelp::get_linkmenu(29); 
                @endphp
                <div id="cd-search" class="cd-search">
						<form class="form-search" id="searchForm" action="{{url($linkSearch)}}" method="get">
							<input type="text" value="" name="q" id="q" placeholder="Cari disini...">
						</form>
					</div>
            </div>
            <!-- END container-m-30 -->

        </div>

    </div>
    <!-- END header-wrapper -->

</header>

{{-- <div class="mb-60"></div> --}}
<br><br><br><br>