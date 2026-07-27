@php
$data = Smt\Masterweb\Models\Client::where('publish','1')->orderBy('urutan', 'asc')->get();
@endphp
<div class="page-section p-50-cont" style="background-color: #F7FAFC;">
    <div class="">
        <div class="mb-50">
            <div class="site-heading">
                <h1 class="uppercase text-center bold">Kerja sama <span class="bold font-blue">sekolah</span></h1>
            </div>
        </div>
    </div>
    <section class="client">
        <div class="container">
            <div class="row">
                <div class="row client-row">
                    @foreach($data as $item)
                    <div class="col-xs-6 col-md-4 col-sm-4 text-center">
                        <a href="" target="_blank">
                            <img alt="client" class="img-client" src="{{asset('assets/public/images/client/'.$item->file_client)}}">
                        </a> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>