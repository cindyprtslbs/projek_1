<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    @if(Auth::user()->role === 'admin')
    <li>
        <span class="menu-title" style="font-weight: bold;" >Administrator</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('page')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Admin Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('dashboardq')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('admin.index') }}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Kelola Users</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('jenis-user.index') }}">
            <i class="icon-lock menu-icon"></i>
            <span class="menu-title">Jenis User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('berita')}}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Informasi Gempa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('cuaca')}}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Informasi Cuaca</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('setting_menu_user.index') }}">
            <i class="icon-lock menu-icon"></i>
            <span class="menu-title">Edit User Role</span>
        </a>
    </li>
        <li class="nav-item">
        <a class="nav-link active" href="{{ route('menu.index') }}">
            <i class="icon-lock menu-icon"></i>
            <span class="menu-title">Menu</span>
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('kategori.index') }}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Kategori</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('buku.index') }}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('email') }}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Email</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('posts.index') }}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Social Feeds</span>
      </a>
    </li>
    @endif

    <li>
        <span class="menu-title" style="font-weight: bold;" >User</span>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('page')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    @foreach ($menus as $menu)
    {{-- @if (Auth::user()->jenis_user == $menu->menu_name) --}}
    <li class="nav-item">
      <a class="nav-link active" href="{{ $menu->menu_link }}">
        <i class="{{$menu->menu_icon}}"></i>
        <span class="menu-title">{{$menu->menu_name}}</span>
      </a>
    </li>
    {{-- @endif --}}
    @endforeach
    {{-- @php
        $jenisUser = DB::table('setting_menu_user')
            ->where('id_jenis_user', Auth::user()->id_jenis_user)
            ->pluck('menu_id')
            ->toArray();
    @endphp

    @foreach ($menus as $menu)
    @if (in_array($menu->menu_name, $jenisUser))
        <li class="nav-item">
            <a class="nav-link {{ Request::is($menu->menu_link . '*') ? 'active' : '' }}" href="{{ url($menu->menu_link) }}">
                <i class="{{ $menu->menu_icon }}"></i>
                <span class="menu-title">{{ $menu->menu_name }}</span>
            </a>
        </li>
    @endif
@endforeach --}}



      <!-- Sidebar untuk Admin -->
      {{-- <li class="sidebar-title" style="font-weight: bold;"> Administrator </li>
            @foreach ($menus->where('id_level', 1) as $m)
                <li class="sidebar-item {{ Request::is($m->menu_link) ? 'active' : ''}}">
                    <a class="sidebar-link" href="{{ url($m->menu_link) }}">
                        <i class="{{ $m->menu_icon }}"></i>
                        <span> {{ $m->menu_name }}</span>
                    </a>
                </li>
            @endforeach --}}



            {{-- @if (auth()->check())
            <li class="menu-title" style="font-weight: bold;">{{ auth()->user()->role }}</li>
            @if(isset($menus) && $menus->isNotEmpty())
            @foreach ($menus as $menu)
                @if ($menus->isAccessibleFor(auth()->user()))
                    <li class="sidebar-item {{ Request::is($menu->menu_link) ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{ url($menu->menu_link) }}">
                            <i class="{{ $menu->menu_icon }}"></i>
                            <span> {{ $menu->menu_name }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
            @else
                <li class="sidebar-item">No menus available.</li> <!-- Optional message for no menus -->
            @endif
        @endif --}}

  </ul>
</nav>



