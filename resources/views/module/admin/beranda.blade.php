@extends('template.admin.layout')

@section('title')
  Beranda
@endsection

@php
$user = Auth()->user();
@endphp



@section('content')
  @php
  $user = \App\Models\User::count();
  $article = \App\Models\Content::where('type', '0')->count();
  $content = \App\Models\Content::where('type', '1')->count();
  $topten = \App\Models\Content::orderBy('views', 'desc')->paginate(10);
  $total = \App\Models\Content::sum('views');
  @endphp
  <div class="row grid-margin">
    <div class="col-12">
      <div class="row">
        <div class="col-md-3 col-xs-6 col-sm-6  grid-margin stretch-card">
          <div class="card" style="background:#205373">
            <div class="card-body">
              <div class="d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3 mb-md-0 ">
                  <button class="btn btn-social-icon btn-white btn-rounded">
                    <i class="fa fa-user"></i>
                  </button>
                  <div class="ml-4">
                    <h5 class="mb-0 mt-2 font-white">Jumlah Pengguna
                    </h5>
                    <h3 class="mt-2 font-white">{{ number_format($user, 0, ',', '.') }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background: #25668F;">
            <div class="card-body">
              <div class="d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <button class="btn btn-social-icon btn-white btn-rounded">
                    <i class="fa fa-sitemap"></i>
                  </button>
                  <div class="ml-4">
                    <h5 class="mb-0 mt-2 font-white">Jumlah Artikel</h5>
                    <h3 class="mt-2 font-white">{{ number_format($article, 0, ',', '.') }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background: #205373;">
            <div class="card-body">
              <div class="d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <button class="btn btn-social-icon btn-white btn-rounded">
                    <i class="fas fa-star"></i>
                  </button>
                  <div class="ml-4">
                    <h5 class="mb-0 mt-2 font-white">Jumlah Konten</h5>
                    <h3 class="mt-2 font-white">{{ number_format($content, 0, ',', '.') }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body" style="background: #25668F;">
              <div class="d-md-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                  <button class="btn btn-social-icon btn-white btn-rounded">
                    <i class="fas fa-star"></i>
                  </button>
                  <div class="ml-4">
                    <h5 class="mb-0 mt-2 font-white">Total Pengunjung</h5>
                    <h3 class="mt-2 font-white">{{ number_format($total, 0, ',', '.') }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="card col-md-12">
      <div class="card-body">
        <h4 class="card-title">
          <i class="fas fa-table"></i>
          Halaman Teratas
        </h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>View</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topten as $top10)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $top10->title }}</td>
                  <td>{{ number_format($top10->views, 0, ',', '.') }}</td>
                  <td>{{ $top10->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    if ($("#inline-datepicker-example").length) {
      $('#inline-datepicker-example').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
      });
    }
  </script>
@endsection
