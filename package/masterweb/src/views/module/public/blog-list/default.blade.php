@php
$menu_id = 5;//SmtHelp::get_menuid(18);
$linkmenu = SmtHelp::get_linkmenu(18);
$artikel = \Smt\Masterweb\Models\Content::orderBy('date','DESC')->where([['publish', '1'],['type',
'0'],['menu_id',$menu_id]])->paginate(10);
@endphp
<div class="page-section p-50-cont" style="background-color: #F7FAFC;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="left">
                        <div class="site-heading">
                            <h1 class="uppercase bold">berita <span class="bold font-blue">terbaru</span></h1>
                        </div>
                    </div>
                    <div class="right">
                        <a class="button small blue right-1" href="{{$linkmenu}}" style="margin-top:26px">Berita
                            Selengkapnya</a>
                    </div>

                    <div id="news-slider" class="owl-carousel">
                        @foreach ($artikel as $content)
                        @php
                            $img_articel = $content->img_thumbnail ?? ""; 
                            if($img_articel != "")
                            {
                                if (file_exists( public_path() . '/assets/public/images/' . $img_articel)) {
                                    $img_articel = 'assets/public/images/' . $img_articel;
                                } else {
                                    $img_articel = 'assets/public/images/blank/blank-images.png';
                                }   
                            } else {
                                $img_articel = 'assets/public/images/blank/blank-images.png';
                            }   
                        @endphp
                        <div class="post-slide">
                        <div class="post-prev-img">
                            <a href="{{ url("$linkmenu/view/".$content->link_url) }}">
                          
                                <img src="{{asset($img_articel)}}" alt="{{$content->title}}">
                            {{-- <img src="{{SmtHelp::img_empty('assets/public/images/article_thumb/',$content->img_thumbnail)}}" alt="img"> --}}
                            </a>
                            </div>
                          <div class="post-content">
                            <h3 class="post-title">
                                <a href="{{ url("$linkmenu/view/".$content->link_url) }}">{{$content->title}}</a>
                            </h3>
                            <!-- <p class="demo-text">{!!$content->content!!}</p> -->
                            
                            <span class="post-date"><i class="fa fa-clock-o"></i>
                            {{ SmtHelp::fdate(explode(' ',$content->date)[0],"DDMMYYYY") }}<span class="slash-divider">/</span>{{ $content->author }}
                            </span>
                            <br><br>
                            <a href="{{ url("$linkmenu/view/".$content->link_url) }}" class="read-more">Selengkapnya</a>
                          </div>
                        </div>
                        @endforeach
                      </div>
            </div>

        </div>
    </div>
</div>

<script>
    
$(document).ready(function() {
    $("#news-slider").owlCarousel({
        items : 3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true
    });
});
</script>
@yield('js')