@php
    $datas = \Smt\Masterweb\Models\Album::where('publish','1')->orderBy('created_at','DESC')->paginate(12);
@endphp
<div class="page-section p-80-cont" style="background-color: #F7FAFC;">
    <div class="container">
        <div class="row">
            <div class="relative">
                <div class="">
                    <div class="mb-50">
                        <div class="site-heading">
                            <h1 class="uppercase text-center bold">Galeri <span class="bold font-blue">kami</span></h1>
                        </div>
                    </div>
                </div>
                <!-- ITEMS GRID -->
                 @foreach ($datas as $data)
                  @php
                      $img = $data->gallery->images;
                      if (file_exists( public_path('/assets/public/images/')  . $img)) {
                          $img = 'assets/public/images/' . $img;
                      } else {
                          $img = 'assets/public/images/blank/blank-images.png';
                      }   

                      $count = $data->galleries->count();
                  @endphp
                <div class="col-sm-6 col-md-4 col-lg-4 wow fadeIn pb-70" style="visibility: visible; animation-name: fadeIn;">
                  
                <div class="post-prev-img">
                  <a href="/galeri/view/{{$data->link}}"><img src="{{asset($img)}}" alt="{{$data->nama}}"></a>
                </div>
                  
                <div class="post-prev-title">
                    <a href="/galeri/view/{{$data->link}}">
                  <h3 style="font-size:16px;font-weight:bold;padding:0px !important;">{{$data->nama}}</h3>
                     </a>
                </div>
                
                <p>
                    {{$count}} Gambar
                </p>
                  
                <div class="post-prev-more-cont clearfix">
                  <div class="post-prev-more">
                    <a href="/galeri/view/{{$data->link}}" class="blog-more">Selengkapnya</a>
                  </div>    
                </div>
              
              </div>
                @endforeach
                
                <!--<ul class="port-grid port-grid-3 port-grid-gut clearfix" id="items-grid">-->
                 
                  <!-- Item 1 -->
                <!--  <li class="port-item mix">-->
                <!--    <a href="/galeri/view/{{$data->gallery->link}}">-->
                <!--      <div class="port-img-overlay">-->
                <!--        <img class="port-main-img" src="{{asset($img)}}" alt="img" ></div>-->
                <!--    </a>-->
                <!--    <div class="port-overlay-cont">-->
                <!--        <div class="port-title-cont">-->
                <!--          <h3><a href="/galeri/view/{{$data->link}}" class="bold uppercase">{{$data->nama}}</a></h3>-->
                <!--          <span><a href="/galeri/view/{{$data->link}}">{{$count}} Gambar</a></span>-->
                <!--          <br>-->
                <!--          <span><a href="/galeri/view/{{$data->link}}" class="bold color-white">Selengkapnya</a></span>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--  </li>-->
                       
                <!--</ul>-->
                <center>
                    {{ $datas->links() }}
                </center>
              </div>
        </div>
    </div>
</div>