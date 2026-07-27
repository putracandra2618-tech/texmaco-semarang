<?php
    $menu_id = SmtHelp::get_menuid();
    
    $linkmenu = SmtHelp::get_linkmenu();
    $link = request()->segment(1);
    $get_artikel = \Smt\Masterweb\Models\Content::where([['publish', '1'],['type', '1'],['menu_id',$menu_id]])->first();
    if($get_artikel == NULL)
    {
        ?>
        <div class="container">
            <div class="alert alert-danger"><p>konten belum dimasukkan!</p></div>
        </div>
        <?php
    }else{
        //update views
        $content = \Smt\Masterweb\Models\Content::findOrFail($get_artikel->id_content);
        $content->views = $get_artikel->views+1;
        $content->save();
        ?>
        <div class="container p-110-cont">
        <div class="container">
            <div class="col-sm-9 blog-main-posts">
                <h3 class="bold"><a href="#">{{ $get_artikel->title }}</a></h3>
                <span class="font-size-14-real"> {!! $get_artikel->content !!}</span>
            </div>
            <?php
    }
?>
            <div class="col-sm-4 col-md-3">
            <div class="widget">
               <div class="box-widget">
               <div class="img-wrapper">
                   <a href="https://smktexmaco-smg.sch.id/bse.kemendiknas.go.id" target="_blank">
                    <img class="inner-img" src="{{asset('assets/public/images/widget/61859130cisco.png')}}" />
                    </a>
                </div>
                <div class="img-wrapper">
                   <a href="https://siatex.smktexmaco-smg.sch.id/" target="_blank">
                    <img class="inner-img" src="{{asset('assets/public/images/widget/8395385LOGIN.png')}}" />
                    </a>
                </div>
                <div class="img-wrapper">
                   <a href="http://www.depdiknas.go.id/" target="_blank">
                    <img class="inner-img" src="{{asset('assets/public/images/widget/78775024DPNRI.png')}}" />
                    </a>
                </div>
               </div>
              </div>
              <div class="widget">
               <div class="box-widget">
               <h5 class="widget-title">Berikan Penilaian Anda</h5>
               <hr class="no-margin">
                <div class="tampilan_voting">
                    <label>Bagaimana Kualitas Lulusan SMK Texmaco Semarang?</label>
                    <br><br>
                    <div class="rating left">
                        <div class="stars right">
                          <a class="star rated"></a>
                          <a class="star"></a>
                          <a class="star"></a>
                          <a class="star"></a>
                          <a class="star"></a>
                        </div>
                      </div>
                      <br><br>
                            <button class="button small blue kirim-vote" style="width: 100%;text-align: center;">KIRIM</button>
                            </div>
               </div>
              </div>
              <div class="widget">
               <div class="box-widget">
               <h5 class="widget-title">Instansi Terkait</h5>
               <ul class="links-list bold a-text-cont">
                  <li class="border-link"><a href="http://www.disdik.semarangkota.go.id/" target="_blank">Dinas Pendidikan Kota Semarang</a></li>
                  <li class="border-link"><a href="http://smk.kemdikbud.go.id/" target="_blank">Direktorat Pembinaan SMK</a></li>
                  <li class="border-link"><a href="http://dikti.go.id/" target="_blank">DIKTI</a></li>
                  <li class="border-link"><a href="http://www.pdkjateng.go.id/" target="_blank">Dinas  Pendidikan Propinsi Jawa Tengah</a></li>
                  <li class="border-link"><a href="https://www.netacad.com/" target="_blank">Cisco Networking Academy</a></li>
                </ul>
               </div>
              </div>
            </div>
        </div>
        </div>
     
<script>
    jQuery(document).ready(function($) {
        $('.rating .star').hover(function() {
          $(this).addClass('to_rate');
          $(this).parent().find('.star:lt(' + $(this).index() + ')').addClass('to_rate');
          $(this).parent().find('.star:gt(' + $(this).index() + ')').addClass('no_to_rate');
        }).mouseout(function() {
          $(this).parent().find('.star').removeClass('to_rate');
          $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate');
        }).click(function() {
          $(this).removeClass('to_rate').addClass('rated');
          $(this).parent().find('.star:lt(' + $(this).index() + ')').removeClass('to_rate').addClass('rated');
          $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate').removeClass('rated');
          /*Save your rate*/
          /*TODO*/
        });
      });
</script>
@yield('js')