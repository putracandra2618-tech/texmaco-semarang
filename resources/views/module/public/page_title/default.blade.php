@php
$title = (request()->segment(1) != NULL) ? SmtHelp::get_linkname() : "";
@endphp
@if (SmtHelp::get_type() == "2" OR SmtHelp::get_type() == "18")  
    @if(request()->segment(2) != NULL)
        @php
            $menu_id = SmtHelp::get_menuid();
            $linkmenu = SmtHelp::get_linkmenu();
            $link = request()->segment(3);
            $get_artikel = \App\Models\Content::where('link_url',$link)->first();
            $subtitle = $get_artikel->title;
        @endphp
    @endif
@endif

<div class="page-title-cont page-title-small grey-dark-bg">
    <div class="relative container align-left">
      <div class="row">
        
        <div class="col-md-8">
          <h1 class="page-title bold">{{SmtHelp::get_linkname()}}</h1>
        </div>
        
        <div class="col-md-4">
          <div class="breadcrumbs">
            <a href="{{url('')}}">Beranda</a><span class="slash-divider">/</span><a href="{{url(request()->segment(1))}}"> {{ $title }} </a>
            @if (!empty(request()->segment(3)))
                <span class="slash-divider">/</span><a href="#"> {{ $subtitle ?? "" }} </a>
            @endif
          </div>
        </div>
        
      </div>
    </div>
  </div>