
@php
    //sesi 2 categori
    $sesi = Request::segment(2);
    //sesi 3 url category portofilio
    $cat = Request::segment(3);

    if (empty($sesi)) {
        $data = Smt\Masterweb\Models\Portofolio::where('publish','1')->orderBy('created_at','DESC')->paginate(9);
    } else {
        $data = Smt\Masterweb\Models\Portofolio::where('publish','1')->whereHas('category_portofolio',function ($qw) use ($cat)
        {
            $qw->where('link_category_portofolio',$cat);
        })->orderBy('created_at','DESC')->paginate(9);
    }

    $data_cat = Smt\Masterweb\Models\CategoryPortofolio::orderBy('created_at', 'ASC')->get();

@endphp
<div class="page-section p-50-cont">
    <div class="">
        <div class="row">
            <div class="container">
            <div class="">
            <div class="mb-50">
                <div class="site-heading">
                    <h1 class="uppercase text-center bold">Galeri <span class="bold font-blue">Kami</span></h1>
                </div>
            </div>
        </div>
        </div>
            <div class=" plr-30 plr-0-767 clearfix">
                <!-- COTENT CONTAINER -->
                <div class="plr-30 pt-30 pb-20">

                    <div class="relative">
                        <!-- PORTFOLIO FILTER -->
                        <!-- ITEMS GRID -->
                        <!--  @foreach ($data as $item)-->
                        <!--<div class="col-md-4 col-sm-6 col-xs-12 shop-dep-item mb-10">-->
                        <!--    <a href="/portofolio/view/{{ str_replace(' ','-',$item->name_portofolio) }}">-->
                        <!--      <img src="{{asset('assets/public/images/portofolio/'.$item->file_portofolio)}}" alt="{{ $item->name_portofolio }}">-->
                        <!--      <div class="shop-dep-text-cont">-->
                        <!--          <div class="post-prev-title">-->
                        <!--        <h3> <a class="cut-text" href="/portofolio/view/{{ str_replace(' ','-',$item->name_portofolio) }}">{{  strtoupper($item->name_portofolio) }}</a></h3>-->
                        <!--       <span class="label label-primary font-white">{{ ucfirst($item->category_portofolio->name_category_portofolio) }}</span>-->
                        <!--      </div>-->
                        <!--      </div>-->
                        <!--    </a>-->
                        <!-- </div>-->
                        <!-- @endforeach-->
                        <ul class="port-grid port-grid-gut port-grid-3 clearfix row" id="items-grid">
                            @foreach ($data as $item)
                                <li class="port-item mix  {{ $item->category_portofolio->name_category_portofolio }}">
                                     <div class="post-prev-img">
                                        <a href="/portofolio/view/{{ str_replace(' ','-',$item->name_portofolio) }}">
                                          @if (file_exists(public_path('assets/public/images/portofolio_thumb/'.$item->file_portofolio)))
                                            <img src="{{asset('assets/public/images/portofolio_thumb/'.$item->file_portofolio)}}" alt="{{ $item->name_portofolio }}">
                                          @else
                                            <img src="{{asset('assets/public/images/article_thumb/inf.png')}}" alt="">
                                          @endif
                                        </a>
                                        <div class="post-prev-title2 text-center">
                                        <h3 class="bold mt-15"><a href="/portofolio/view/{{ str_replace(' ','-',$item->name_portofolio) }}">{{ ucfirst($item->category_portofolio->name_category_portofolio) }}</a></h3>
                                        </div>
                                      </div>
                                    <!--<div class="port-overlay-cont">-->

                                      
                                        <!--<div class="port-btn-cont">-->
                                        <!--    <a href="{{asset('assets/public/images/portofolio/'.$item->file_portofolio)}}" class="lightbox mr-20">-->
                                        <!--        <div aria-hidden="true" class="icon_search"></div>-->
                                        <!--    </a>-->
                                        <!--    <a href="/portofolio/view/{{ str_replace(' ','-',$item->name_portofolio) }}">-->
                                        <!--        <div aria-hidden="true" class="icon_link"></div>-->
                                        <!--    </a>-->
                                        <!--</div>-->

                                    <!--</div>-->
                                </li>
                            @endforeach
                        </ul>
                        <center>
                            <div class="row">

                                <div class="col-md-12 mb-30">
                                    {{ $data->links("masterweb::template.public.pagination") }}
                                </div>
                        </center>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
