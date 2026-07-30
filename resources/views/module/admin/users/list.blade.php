@extends('template.admin.layout')

@section('title')
User Management
@endsection

@section('content')


  <div class="card">
    <div class="card-body">
      <div class="d-flex">
        <div class="mr-auto p-2">
          {{-- <div id="datepicker-popup" class="input-group date datepicker">
          <input type="text" class="form-control">
          <span class="input-group-addon input-group-append border-left">
            <span class="far fa-calendar input-group-text"></span>
          </span>
        </div> --}}
        </div>

        <div class="p-2">
          @if(SmtHelp::getAction("create"))
          <a href="{{ route('adm-users.create') }}">
            <button type="button" class="btn btn-info btn-icon-text">
              Tambah Data
              <i class="fa fa-plus btn-icon-append"></i>
            </button>
          </a>
          @endif
        </div>
      </div>

      <div class="row">
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Hak Akses</th>
                  <th>Nama</th>
                  <th>Foto</th>
                  <th>Status</th>
                  @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <th>Actions</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($users as $duser)
                  @php
                    $privilege = \App\Models\Privileges::find($duser->level);
                  @endphp
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $duser->username }}</td>
                    <td>{{ $privilege->name }}</td>
                    <td>{{ $duser->name }}</td>
                    <td>
                      <label class="bg-user">
                        <img
                          src="{{ $duser->photo == null? asset('assets/admin/images/logo/favicon.png'): asset('assets/admin/images/photo_thumb/' . $duser->photo) }}"
                          alt="image" />
                      </label>
                    </td>
                    <td>
                      @if ($duser->publish == 1)
                        <a href="/publish-users/{{$duser->id}}">
                          <label class="badge badge-info">Aktif</label>
                        </a>
                      @else
                        <a href="/publish-users/{{$duser->id}}">
                          <label class="badge badge-danger">Tidak Aktif</label>
                        </a>
                      @endif
                    </td>
                    @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                    <td>
                      {{-- <button type="button" class="btn btn-outline-info btn-rounded btn-icon">
                            <i class="fa fa-eye"></i>
                        </button> --}}
                      <a href="/reset-users/{{ $duser->id }}">
                        <button type="button" class="btn btn-outline-primary btn-rounded btn-icon" title="Reset Password">
                          <i class="icon-refresh"></i>
                        </button>
                      </a>
                      @if(SmtHelp::getAction("update"))
                      <a href="{{ route('adm-users.edit', [$duser->id]) }}">
                        <button type="button" class="btn btn-outline-warning btn-rounded btn-icon">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
                      </a>
                      @endif
                      @if(SmtHelp::getAction("delete"))
                      <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline"
                        action="{{ route('adm-users.destroy', [$duser->id]) }}" method="POST">
                        @csrf
                      <input type="hidden" name="_method" value="DELETE">

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
