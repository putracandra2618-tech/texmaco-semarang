@extends('template.admin.layout')

@section('title')
  Master Public Menu
@endsection

@section('css')
@endsection

@section('content')
  <div class="col-12 grid-margin" id="order-menu">
    <div class="card">
      <div class="card-body">
        <div class="d-flex">
          <div class="p-2">
            @if(SmtHelp::getAction("create"))
            <button type="button" data-toggle="modal" data-target="#addModal" data-whatever="@fat"
              class="btn btn-info btn-icon-text">
              <i class="fa fa-plus-circle mr-2"></i> Tambah Data
            </button>
            @endif
          </div>
        </div>
        @foreach ($data as $menu)
          <div class="main-menu-container">
            <div class="card rounded border mb-2 main-menu" id="{{ $menu->id }}">
              <div class="card-body p-3">
                <div class="media">
                  <i class="fa fa-sort handle icon-sm align-self-center mr-3"></i>
                  <div class="media-body">
                    <div class="d-flex bd-highlight">
                      <div class="mr-auto p-2 bd-highlight">
                        <h6 class="sub-handle">{{ $menu->name }}</h6>
                        <p class="mb-0 text-muted">
                          {{ $menu->type_link == 0 ? 'link' : 'url' }} : {{ $menu->link }} | Type :
                          {{ $menu->typeMenu->name }}
                        </p>
                      </div>
                      <div class="p-2 bd-highlight">
                        <p>
                          @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                          <form onsubmit="return confirm('Delete this menu permanently?')" class="d-inline"
                            action="{{ url('menu/destroy/' . $menu->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            @if(SmtHelp::getAction("update"))
                            <button type="button" class="btn btn-sm btn-primary edit-module"
                              data-id="{{ $menu->id }}">Edit</button>
                            @endif
                            @if(SmtHelp::getAction("delete"))
                            <button class="btn btn-sm btn-danger">Delete</button>
                            @endif
                            <a href="{{ url('adm-layout/type/' . $menu->type) }}">
                              <button type="button" class="btn btn-info btn-icon-text btn-sm">
                                <i class="fab fa-trello menu-icon btn-icon-prepend"></i>
                                Sesuaikan Layout
                              </button>
                            </a>
                          </form>
                          @endif
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @php
                $subdata = \App\Models\Menu::all()
                    ->where('publish', '1')
                    ->sortBy('order')
                    ->where('upmenu', $menu->id);
              @endphp
              <div class="mr-4 ml-4 py-2 submenu-container">
                @foreach ($subdata as $submenu)
                  <div class="card rounded border mb-2 sublist-menu" id="{{ $submenu->id }}">
                    <div class="card-body p-3">
                      <div class="media">
                        <i class="fa fa-sort icon-sm align-self-center mr-3"></i>
                        <div class="media-body">
                          <div class="d-flex bd-highlight">
                            <div class="mr-auto p-2 bd-highlight">
                              <h6 class="sub-handle">{{ $submenu->name }}</h6>
                              <p class="mb-0 text-muted">
                                {{ $submenu->type_link == 0 ? 'link' : 'url' }} : {{ $submenu->link }} | Type :
                                {{ $submenu->typeMenu->name }}
                              </p>
                            </div>
                            <div class="p-2 bd-highlight">
                              <p>
                              @if((SmtHelp::getAction("update")||SmtHelp::getAction("delete")))
                                <form onsubmit="return confirm('Delete this submenu permanently?')" class="d-inline"
                                  action="{{ url('menu/destroy/' . $menu->id) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
                                  @if(SmtHelp::getAction("update"))
                                  <button type="button" class="btn btn-sm btn-primary edit-module"
                                    data-id="{{ $submenu->id }}">Edit</button>
                                  @endif
                                  @if(SmtHelp::getAction("delete"))
                                  <button class="btn btn-sm btn-danger">Delete</button>
                                  @endif
                                  <a href="{{ url('adm-layout/type/' . $submenu->type) }}">
                                    <button type="button" class="btn btn-info btn-icon-text btn-sm">
                                      <i class="fab fa-trello menu-icon btn-icon-prepend"></i>
                                      Sesuaikan Layout
                                    </button>
                                  </a>
                                </form>
                              @endif
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Tambah Menu Publik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('menu/store') }}">
          <div class="modal-body">
            @csrf

            <div class="form-group">
              <label for="recipient-name">Parent</label>
              <select name="upmenu" class="form-control">
                <option value="0">Induk</option>
                @foreach ($parent as $dparent)
                  <option value="{{ $dparent->id }}">{{ $dparent->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="recipient-name">Type</label>
              <select name="type" id="type" class="form-control type">
                <option>Pilih Type Layout</option>
                @foreach ($type as $dtype)
                  <option value="{{ $dtype->id }}">{{ $dtype->name }}</option>
                @endforeach
              </select>
              <input type="text" id="typeNew" style="display: none" class="form-control typeNew" name="typeNew" value=""
                placeholder="atau buat type baru">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="name" value="">
            </div>

            <div class="form-group">
              <label>Link</label>
              <input type="text" class="form-control" name="link" value="">
            </div>
            <div class="form-group">
              <label>Type Link</label>
              <div class="form-inline">
                <div class="form-check mr-3">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type_link" id="type_link" value="0">
                    Link
                  <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type_link" id="type_link" value="1">
                    Url
                  <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Edit Menu Publik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('menu/update') }}">
          <div class="modal-body">
            @csrf
            <div class="form-group">
              <label for="recipient-name">Parent</label>
              <select name="upmenu" id="upmenu" class="form-control">
                <option value="0">Induk</option>
                @foreach ($parent as $dparent)
                  <option value="{{ $dparent->id }}">{{ $dparent->name }}</option>
                @endforeach
              </select>

              <input type="hidden" id="id" class="form-control" name="id" value="">
            </div>

            <div class="form-group">
              <label for="recipient-name">Type</label>
              <select name="type" id="type_edit" class="form-control type">
                <option>Pilih Type Layout</option>
                @foreach ($type as $dtype)
                  <option value="{{ $dtype->id }}">{{ $dtype->name }}</option>
                @endforeach
              </select>
              <input type="text" id="typeNew" style="display: none" class="form-control typeNew_edit" name="typeNew" value=""
                placeholder="atau buat type baru">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" id="name" class="form-control" name="name" value="">
            </div>

            <div class="form-group">
              <label>Link</label>
              <input type="text" id="link" class="form-control" name="link" value="">
            </div>

            <div class="form-group">
              <label>Type Link</label>
              <div class="form-inline">
                <div class="form-check mr-3">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type_link" id="type_link" value="0">
                    Link
                  <i class="input-helper"></i></label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type_link" id="type_link" value="1">
                    Url
                  <i class="input-helper"></i></label>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    var containers = $('.main-menu-container').toArray();
    var sub_container = $('.submenu-container').toArray();

    dragula({
        containers: sub_container,
      })
      .on('drop', function(el) {
        var main = new Array();
        $('#order-menu').find('.main-menu').each(function() {
          var subId = new Array();
          var mainId = $(this).attr('id');
          $(this).find('.sublist-menu').each(function() {
            subId.push($(this).attr('id'));
          });
          main.push([mainId, subId])
        });
        $.ajax({
          url: "{{ url('menu/sort') }}",
          method: "POST",
          data: {
            'main': main,
            '_token': '{{ csrf_token() }}'
          },
          success: function(data) {
            // alert('Data berhasil diperbarui');
          }
        });
      })
    dragula({
        containers: containers,
        moves: function(el, container, handle) {
          return handle.classList.contains('handle');
        }
      })
      .on('drop', function(el) {
        var main = new Array();
        $('#order-menu').find('.main-menu').each(function() {
          var subId = new Array();
          var mainId = $(this).attr('id');
          $(this).find('.sublist-menu').each(function() {
            subId.push($(this).attr('id'));
          });
          main.push([mainId, subId])
        });
        $.ajax({
          url: "{{ url('menu/sort') }}",
          method: "POST",
          data: {
            'main': main,
            '_token': '{{ csrf_token() }}'
          },
          success: function(data) {
            // alert('Data berhasil diperbarui');
          }
        });
      });

    $(function () {
      $('.type').on('change',function () {
        
        if ($('.type').val()=="33") {
          $('.typeNew').show();
        }else{
          $('.typeNew').hide();
        }
      })
      $('#type_edit').on('change',function () {
        
        if ($('#type_edit').val()=="33") {
          $('.typeNew_edit').show();
        }else{
          $('.typeNew_edit').hide();
        }
      })
    })
    // edit module
    $(document).on('click', '.edit-module', function() {
      var id = $(this).attr('data-id');
      $.ajax({
        url: "{{ url('menu/data') }}",
        method: "POST",
        data: {
          'id': id,
          '_token': '{{ csrf_token() }}'
        },
        success: function(data) {
          var obj = JSON.parse(data);

          $('#id').val(obj.id);
          $('#upmenu').val(obj.upmenu);
          $('#name').val(obj.name);
          $('#icon').val(obj.icon);
          $('#link').val(obj.link);
          $('#type_edit').val(obj.type);

          if (obj.type_link==0) {
            $("input[name='type_link'][value=0]").attr('checked',true);
          } else {
            $("input[name='type_link'][value=1]").attr('checked',true);
          }

          $('#editModal').modal('show')
        }
      });
    });
  </script>
@endsection
