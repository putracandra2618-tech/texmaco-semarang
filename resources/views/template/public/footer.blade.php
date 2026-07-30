@php
//get setting option
$option = \App\Models\Option::first();
//get sosial media
$socmed = \App\Models\Socmed::all()->where('publish','1');
//get contact
$contact = \App\Models\Contact::first();
@endphp
<!-- FOOTER 3 BLACK  -->
        <footer id="footer4" class="page-section pt-80 pb-50" style="background: #027CC3;">
          <div class="container-m-60">
            <div class="row">
            
              <div class="col-md-3 col-sm-3 widget">
                <div class="mb-20">
                  <a href="index.html">
                    <img class="logo-footer" src="{{asset('assets/public/images/logo/logo-sia-white.png')}}" alt="logo">
                  </a>
                </div>
                <div class="color-white footer-2-text-cont">
                  <address class="">
                  {{strip_tags($contact->alamat)}}
                  </address>
                </div>
                <div class="footer-2-text-cont  color-white">
                  Telp. {{$contact->phone}},  <br>
                  Fax. (024) 8661967 <br>
                  Email : {{$contact->email}}
                </div>
              </div>
              
              <div class="col-md-3 col-sm-3 widget">
                <h4 class="color-white">Profile Sekolah</h4>
                <ul class="links-list  a-text-cont">
                  <li><a class="color-white" href="/profil-sekolah">Profil Sekolah</a></li>
                  <li><a class="color-white" href="/visi-misi-tujuan">Visi Misi dan Tujuan</a></li>
                  <li><a class="color-white" href="/pimpinan-sekolah">Pimpinan Sekolah</a></li>
                  <li><a class="color-white" href="/struktur-organisasi">Struktur Organisasi</a></li>
                </ul>
              </div>
              
              <div class="col-md-3 col-sm-3 widget">
                <h4 class="color-white">Konsentrasi Keahlian</h4>
                <ul class="links-list  a-text-cont" >
                  <li><a class="color-white" href="/teknik-elektronika-industri">Teknik Elektronika Industri</a></li>
                  <li><a class="color-white" href="/teknik-kendaraan-ringan">Teknik Kendaraan Ringan</a></li>
                  <li><a class="color-white" href="/teknik-permesinan">Teknik Permesinan</a></li>
                  <li><a class="color-white" href="/teknik-permintalan-serat-buatan">Teknik Pemintalan Serat Buatan</a></li>
                  <li><a class="color-white" href="/tata-busana">Tata Busana</a></li>
                  <li><a class="color-white" href="/teknik-komputer-jaringan">Teknik Komputer Jaringan</a></li>
                  <li><a class="color-white" href="/rekayasa-perangkat-lunak">Rekayasa Perangkat Lunak</a></li>
                </ul>
              </div>
              
              <div class="col-md-3 col-sm-3 widget">
                <h4 class="color-white">Sosial Media</h4>
                <div id="post-list-footer">
                  <div class="">
                    <a class="color-white" href="https://www.instagram.com/smktexmacosemarang/" title="Instagram" target="_blank">
                      <img src="{{asset('assets/public/images/logo/instagram.png')}}" alt="" width="70%" style="margin-left:-15px;">
                    </a>
                    <a class="color-white" href="https://www.youtube.com/channel/UCqkCTDH7gR2IdtrQBFcGhGA" title="Youtbue" target="_blank">
                      <img src="{{asset('assets/public/images/logo/youtube.png')}}" alt="" width="70%" style="margin-left:-15px;">
                    </a>
                  </div>
                </div>                  

                {{--  <h4 class="color-white">Link Terkait</h4>
                <div id="post-list-footer">
                  <ul class="links-list  a-text-cont" >
                  <li><a class="color-white" href="">PPDB Texmaco</a></li>
                  <li><a class="color-white" href="">SIATEX</a></li>
                  </ul>
                </div>                    --}}
              </div>
            </div>    
            
            <div class="footer-2-copy-cont clearfix">

              <!-- Copyright -->
              <div class="text-center">
                <span class="color-white">
                    <a href="#" class="color-white">{{ $option->footer}}</a>
                </span>
          </div>

            </div>
                    
          </div>
        </footer>
        
        <!-- FOOTER 2 -->
        {{--  <footer id="footer2" class="page-section pt-80 pb-50 bg-footer">
          <div class="container">
            <div class="row">
                <center>
                    <img src="https://v3.sevenmediatech.co.id/assets/public/images/logo/LOGO%20SMT%20New%20White.png" width="20%" alt="">
                </center>
                <blockquote class="quote mt-20 mb-40 m-p-0 text-center white">
                    <h3 class="font-white"><b>“If your Business is not on the Internet, then your Business will be out of business”</b></h3>
                          <footer class="font-white">Bill Gates, Founder Microsoft.</footer>
                </blockquote>        
                
                <div class="mt-20 mb-40 text-center">
                    <a class="button medium thin hover-dark tp-button white" href="https://api.whatsapp.com/send?phone=6285747747725&amp;text=Halo,Seven%20Media%20Technology"><i class="fa fa-whatsapp mr-5"></i>HUBUNGI KAMI</a>
                </div>
            </div>      --}}
            
            {{--  <div class="footer-2-copy-cont clearfix">
              <!-- Social Links -->
              <div class="footer-2-soc-a right">
                @foreach ($socmed as $socmed)
                <a href="{{$socmed->link}}" class="font-white" title="{{$socmed->name}}" target="_blank">
                        <span aria-hidden="true" class="{{$socmed->icon}}"></span>
                    </a>  --}}
                {{-- <a href="{{$socmed->link}}" target="_blank"><i class="{{$socmed->icon}} btn-white"></i></a> --}}
                {{--  @endforeach
               
              </div>  --}}
              <!-- Copyright -->
              {{--  <div class="left">
                <a class="footer-2-copy fnt-size font-white" href="/tentang-kami" target="_blank">Tentang Kami</a>
                <a class="footer-2-copy fnt-size font-white" href="/faq" target="_blank">Faq</a>
                <a class="footer-2-copy fnt-size font-white" href="/kontak" target="_blank">Kontak</a>
              </div>
              <div class="text-center">
                    <span class="font-white">
                        <a href="#" class="font-white">{{ $option->footer}}</a>
                    </span>
              </div>
            </div>
                    
          </div>
        </footer>  --}}
        {{-- <a target="_blank" href="https://api.whatsapp.com/send?phone=6285747747725&amp;text=Halo,Seven%20Media%20Technology" class="whatsapp-button"><i class="fa fa-whatsapp"></i></a> --}}
        <!--<a target="_blank" href="/penawaran" class="penawaran-button">-->
        <!--  <center>-->
        <!--    Buat Penawaran-->
        <!--  </center>-->
        <!--  </a>-->
        