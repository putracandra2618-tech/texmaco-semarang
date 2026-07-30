@php
$menu_id = 48;//SmtHelp::get_menuid(18);
$linkmenu = SmtHelp::get_linkmenu(18);
$artikel = \App\Models\Content::orderBy('date','DESC')->where([['publish', '1'],['type',
'0'],['menu_id',$menu_id]])->paginate(10);
@endphp
<div class="page-section p-50-cont">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="left">
                        <div class="site-heading">
                            <h1 class="uppercase bold">kegiatan <span class="bold font-blue">kami</span></h1>
                        </div>
                    </div>
                    <div class="right">
                        <a class="button small blue right-1" href="/kegiatan" style="margin-top:26px">Berita
                            Selengkapnya</a>
                    </div>

                    <div id="agenda-news" class="owl-carousel">
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
                          <div class="post-img">
                            <img src="{{asset($img_articel)}}" alt="{{$content->title}}">
                            <a href="{{ url("$linkmenu/view/".$content->link_url) }}" class="over-layer"><i class="fa fa-link"></i></a>
                          </div>
                          <div class="post-content">
                            <h3 class="post-title">
                                <a href="{{ url("$linkmenu/view/".$content->link_url) }}">{{$content->title}}</a>
                            </h3>
                            <!-- <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p> -->
                            
                            <span class="post-date"><i class="fa fa-clock-o"></i>{{ SmtHelp::fdate(explode(' ',$content->date)[0],"DDMMYYYY") }}</span>
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
    $("#agenda-news").owlCarousel({
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