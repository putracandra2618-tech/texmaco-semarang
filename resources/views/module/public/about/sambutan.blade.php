<?php
    $data = \DB::table('tb_content')->where('id_content','fc880867-7dc2-45f3-92ef-0ed90818fffd')->first();
?>

<div id="about" class="page-section">
    <div class="container p-50-cont">
        <div class="row">

            <div class="col-md-4 fes1-img-cont wow fadeInUp mb-20">
                <img src="{{asset('assets/public/images/'.$data->img_thumbnail)}}" alt="{{$data->title}}" width="75%;">
            </div>

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="fes1-main-title-cont wow fadeInDown">
                            <div class="">
                                <h1 class="bold no-margin">{{$data->title}}</h1>
                            </div>
                            <div class="line-3-100"></div>
                        </div>
                        <h5 class="font-w-500">{{$data->deskripsi}}</h5>
                        <p class="text bold color-black">
                          
                            {!! substr($data->content,0,719) !!}
                        </p>
                        <button class="button small gray bold" data-toggle="modal" data-target=".bs-example-modal-lg">Baca Selengkapnya</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg bootstrap-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myLargeModalLabel">{{$data->title}}</h4>
                </div>
                <div class="modal-body">
                    <p class="color-black">  {!! $data->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

