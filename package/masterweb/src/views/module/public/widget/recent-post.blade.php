@php
$linkmenu = SmtHelp::get_linkmenu();
$artikel = \Smt\Masterweb\Models\Content::orderBy('date','DESC')->where([['publish', '1'],['type', '0']])->paginate(9);
@endphp
<div class="page-section p-50-cont">
<div class="widget">
<h5 class="widget-title">Artikel Terbaru</h5>
        <div class="widget-body">
            <ul class="clearlist widget-posts">
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
                <li class="clearfix">
                    <a href="{{ url("$linkmenu/view/".$content->link_url) }}">
                        <img src="{{asset($img_articel)}}" alt="" class="widget-posts-img" style="width: 150px; height:200px;object-fit:cover;">
                        {{--  <img src="{{SmtHelp::img_empty('assets/public/images/',$content->img_thumbnail)}}" class="widget-posts-img" alt="img"></a>  --}}
                    <div class="widget-posts-descr font-blog">
                        <a href="{{ url("$linkmenu/view/".$content->link_url) }}">{{$content->title}}</a><span class="slash-divider">/</span>
                        {{ SmtHelp::fdate(explode(' ',$content->date)[0],"DDMMYYYY") }}<span class="slash-divider">/</span>{{ $content->author }}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
