<?php
$controller = Request::segment(1);
$method = Request::segment(2);
$bc = SmtHelp::get_adminmenu($controller);
$name_module = $bc->name ?? '';
$link = $bc->link ?? '';
?>
<div class="row">
  <div class="col-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home menu-icon mr-1"></i>Beranda</a></li>

        @if ($name_module != null)
          <li class="breadcrumb-item"><a href="{{ $link ?? '' }}">{{ $name_module ?? '' }}</a></li>
        @endif

        @if ($method != null)
          <li class="breadcrumb-item active" aria-current="page" style="text-transform: capitalize">
            @yield('breadcrumb-active')</li>
        @endif
      </ol>
    </nav>
  </div>
</div>
