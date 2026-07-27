@extends('masterweb::template.admin.layout')

@section('title')
    Layanan
@endsection

@section('content') 
  <div class="card">
    <div class="card-body">
      <div class="d-flex">
        <div class="mr-auto p-2">
        </div>

        <div class="p-2">
          @if(SmtHelp::getAction("create"))
            <a href="{{route('admlayanan.create')}}">
                <button type="button" class="btn btn-info btn-icon-text">
                    Tambah Data
                    <i class="fa fa-plus btn-icon-append"></i>                             
                </button>
            </a>
          @endif
        </div>
    </div>

      <div class="row">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif 
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Judul</th>
                    <th>Image</th>
                    <th>Urutan</th>
                    @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <th>Actions</th>
                    @endif
                </tr>
              </thead>
              <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($data as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->menu['name']}}</td>
                    <td>{{$data->title}}</td>
                    <td>@if (empty($data->image) || $data->image == null)
                            <a href="{{asset('assets/public/images/defult.png')}}" target="_blank"><img src="{{asset('assets/public/images/default.png')}}"></a>
                        @else
                            <a href="{{asset('assets/public/images/layanan/'.$data->image)}}" target="_blank"><img src="{{asset('assets/public/images/layanan/'.$data->image)}}"></a>
                        @endif
                    </td>
                    <td>{{$data->urutan}}</td>
                    @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <td>
                      @if(SmtHelp::getAction("update"))
                        <a href="{{route('admlayanan.edit', [$data->id_layanan])}}">
                            <button type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="tooltip" data-custom-class="tooltip-dark" data-placement="top" title="Edit Data">
                                <i class="fas fa-pencil-alt"></i>                                                    
                            </button> 
                        </a>
                      @endif
                      @if(SmtHelp::getAction("delete"))
                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')" 
                            class="d-inline" 
                            action="{{route('admlayanan.destroy', [$data->id_layanan])}}" 
                            method="POST">

                                @csrf

                                <input 
                                type="hidden" 
                                name="_method" 
                                value="DELETE">

                                <button type="submit" class="btn btn-outline-danger btn-rounded btn-icon">
                                    <i class="fas fa-trash"></i>                                                    
                                </button> 
                        </form>
                      @endif
                    </td>
                    @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection