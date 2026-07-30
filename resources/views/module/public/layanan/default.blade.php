<?php
//sesi 2 categori
$sesi = Request::segment(2);
//sesi 3 url category portofilio
$cat = Request::segment(3);
// dd($sesi);

$menu_id = SmtHelp::get_menuid();

$linkmenu = SmtHelp::get_linkmenu();
$link = request()->segment(1);
$getServices = \App\Models\Content::where('menu_id', $menu_id)->first();
$get_layanan = \App\Models\Layanan::where('menu_id', $menu_id)->orderby('urutan', "ASC")->get();

if(!empty($cat))
{
    $getService = \App\Models\Layanan::where('link_url', $cat)->first();
}else{
    $getService = \App\Models\Layanan::orderby('urutan', "ASC")->where('menu_id', $menu_id)->first();
}
// if (empty($sesi)) {
//     $get_layanan = \App\Models\Layanan::where('menu_id', $menu_id)->get();
// } else {
//     $get_layanan = \App\Models\Layanan::where('menu_id', $menu_id)->whereHas('category_layanan', function ($qw) use ($cat) {
//     $qw->where('link_category_layanan', $cat);
//     })->orderBy('created_at', 'DESC')->paginate(9);
// }

$data_cat = \App\Models\CategoryLayanan::orderBy('nama_layanan', 'ASC')->get();

if (empty($getServices)) {
?>
    <div class="page-section p-80-cont">
        <div class="container">
            <div class="alert alert-danger nobottommargin">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span aria-hidden="true" class="alert-icon icon_blocked"></span><strong>Perhatian</strong> Konten Belum di Isi, Silahkan Isi Konten Terlebih Dahulu
            </div>
        </div>
    </div>
<?php
} else {
?>
    <!-- FEATURES 4 -->
    <div class="page-section p-50-cont">
        <div class="container">
            <div class="post-prev-text font-blog">
                <p class="gotham-book font-blog"> {!!$getServices->content!!}</p>
            </div>
        </div>
    </div>
<?php
}

if(count($get_layanan)>0){
?>

<div class="page-section plr-30 plr-0-767 clearfix">
    <!-- COTENT CONTAINER -->
    <div class="plr-30 pb-20">

        <div class="relative">
            <div class="col-md-4">
                <h4>PRODUK</h4>
                <ul id="nav-sidebar" class="nav bs-sidenav blog-categories">
                    @foreach ($get_layanan as $item)
                    <li><a href="{{ url("$linkmenu/view/$item->link_url") }}"><span class="blog-cat-icon"><i class="fa fa-angle-right"></i></span>{{$item->title}}</a></li>  
                    @endforeach                    
                </ul>
            </div>
            <div class="col-md-8">
                
                <!-- ITEMS GRID -->
                    <!-- Item 1 -->
                    @if ($getService != NULL)
                    <div class="relative">
                    <div class="col-md-12 pb-50">
                        <div class="">
                                <div class="wow fadeIn">
                    
                                    <div class="post-prev-title">
                                        <h1 class="bold text-center"> {{$getService->title}} </h1>
                                    </div>
                    
                                    <div class="font-blog">
                                        <p class="gotham-book font-blog"> {!!$getService->deskripsi!!}</p>
                                    </div>
                    
                                </div>
                        </div>
                        </div>
                    </div>
                    @endif
            </div>
        </div>

    </div>
</div><?php
}
?>
