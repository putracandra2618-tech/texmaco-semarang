@php
$menu_id = SmtHelp::get_menuid();
$linkmenu = SmtHelp::get_linkmenu();
$artikel = \App\Models\Content::orderBy('date','DESC')->where([['publish', '1'],['type', '0'],['menu_id',$menu_id],['deleted_at',NULL],['title', 'like', '%'.request()->get('q').'%']])->paginate(12);
@endphp

<div class="container p-100-cont">
    <div class="row masonry">
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
                <div class="col-sm-6 col-md-4 col-lg-4 pb-50">
                    <div class="post-prev-img">
                    <a href="{{ url("$linkmenu/view/".$content->link_url) }}">
                        <img src="{{asset($img_articel)}}" alt="">
                      {{-- <img src="{{SmtHelp::img_empty('assets/public/images/article_thumb/',$content->img_thumbnail)}}" alt="img"> --}}
                    </a>
                    </div>

                    <div class="post-prev-title">
                        <h3 style="font-size: 16px;line-height:20px;" class="bold"><a href="{{ url("$linkmenu/view/".$content->link_url) }}">{{$content->title}}</a></h3>
                    </div>

                    <div class="post-prev-info">
                        {{ SmtHelp::fdate(explode(' ',$content->date)[0],"DDMMYYYY") }}<span class="slash-divider">/</span>{{ $content->author }}
                    </div>
                </div>
            @endforeach
    </div>
    <center>
        <div class="row">
            <div class="col-md-12 mb-30">
                {{ $artikel->links("template.public.pagination") }}
            </div>
        </div>
    </center>
</div>

