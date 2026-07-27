@php
  $user = Auth()->user();
  $level = $user->getlevel->level;
  $privilege = \Smt\Masterweb\Models\Privileges::where('id',$user->level)->first();
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="{{ ($user->photo == NULL) ? asset('assets/admin/images/logo/favicon.png') : asset('assets/admin/images/photo/'.$user->photo)}}" alt="image"/>
        </div>
        <div class="profile-name">
          <p class="name">
            Hai, {{explode(' ',$user->name)[0]}}
          </p>
          <p class="designation">
            {{-- {{$privilege->name}} --}}
          </p>
        </div>
      </div>
    </li>

    {{-- LIST MENU --}}
    @php
        $parent = \Smt\Masterweb\Models\AdminMenu::all()->sortBy('order')->where('upmenu','0');
    @endphp
    @foreach ($parent as $menu)
      @php
      $role = \Smt\Masterweb\Models\Role::where('menu_id',$menu->id)->where('privilege_id',$privilege->id)->first();
  
      if($role!=NULL)
      {
        if($role->read == 0)
        {
          continue;
        }
      }

      $child = \Smt\Masterweb\Models\AdminMenu::all()->sortBy('order')->where('upmenu',$menu->id);
      @endphp
     <li class="nav-item">
      @if (count($child) > 0)
        <a class="nav-link" data-toggle="collapse" href="#menu-{{SmtHelp::create_link($menu->name)}}" aria-expanded="false" aria-controls="page-layouts">
          <i class="{{$menu->icon}} menu-icon"></i><span class="menu-title">{{$menu->name}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="menu-{{SmtHelp::create_link($menu->name)}}">
            <ul class="nav flex-column sub-menu"> 
              @foreach ($child as $submenu)
              @php
                $role = \Smt\Masterweb\Models\Role::where('menu_id',$submenu->id)->where('privilege_id',$privilege->id)->first();

                if($role!=NULL)
                {
                  if($role->read == 0)
                  {
                    continue;
                  }
                }
              @endphp
              <li class="nav-item"> <a class="nav-link" href="{{URL::to($submenu->link)}}">{{$submenu->name}}</a></li>
              @endforeach
            </ul>
        </div>
      @else
        <a class="nav-link" href="{{$menu->link}}" >
          <i class="{{$menu->icon}} menu-icon"></i><span class="menu-title">{{$menu->name}}</span>
        </a>
      @endif
    </li>
    @endforeach
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fas fa-power-off menu-icon"></i><span class="menu-title">Logout</span>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
  </ul>
</nav>
