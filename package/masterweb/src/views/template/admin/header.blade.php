@php
  $user = Auth()->user();
  $level = $user->getlevel->level;
@endphp
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-info default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('')}}" target="_blank">
        <img src="{{ asset('assets/admin/images/logo/LOGO SMT New White.png')}}" alt="Logo"/>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('')}}" target="_blank">
            <img src="{{ asset('assets/admin/images/logo-mini.png')}}" alt="logo"/>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <span class="none-hp">{{$user->name}}</span>
                  <span class="text-title">SM MASTER</span>
                  <img src="{{ ($user->photo == NULL) ? asset('assets/admin/images/logo/favicon.png') : asset('assets/admin/images/photo_thumb/'.$user->photo)}}" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="/biodata">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-warning">
                              <i class="fas fa-wrench mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-medium">Pengaturan</h6>
                      </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <div class="preview-thumbnail">
                          <div class="preview-icon bg-info">
                              <i class="fas fa-power-off mx-0"></i>
                          </div>
                      </div>
                      <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-medium">Logout</h6>
                      </div>
                  </a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
      </ul>

        {{-- <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span>{{$user->name}}</span>
              <img src="{{ ($user->photo == NULL) ? asset('assets/admin/images/logo/favicon.png') : asset('assets/admin/images/photo/'.$user->photo)}}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/biodata">
                <i class="fas fa-cog text-primary"></i>
                Pengaturan
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off text-primary"></i> Logout
              </a>


            </div>
          </li>
          {{-- <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li> --}}
        {{-- </ul> --}}
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
