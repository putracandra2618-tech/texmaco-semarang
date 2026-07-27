@php
    $link = request()->segment(3);
    $datas = \Smt\Masterweb\Models\Album::where('link',$link)->first();
@endphp
<div class="page-section p-80-cont" style="background-color: #F7FAFC;">
    <div class="container">
        <div class="row">
              @foreach ($datas->galleries as $gallery)
              @php
                  $img = $gallery->images;
                  if (file_exists( public_path() . '/assets/public/images/' . $img)) {
                      $img = 'assets/public/images/' . $img;
                  } else {
                      $img = 'assets/public/images/blank/blank-images.png';
                  }   
              @endphp
              <div class="col-sm-6 col-md-4 col-lg-4 wow fadeIn pb-70" style="visibility: visible; animation-name: fadeIn;">
                <div class="post-prev-img">
                  <a href="#">
                      <img src="{{asset($img)}}" alt="img">
                    </a>
                </div>
              </div>
              @endforeach
        </div>
    </div>
</div>