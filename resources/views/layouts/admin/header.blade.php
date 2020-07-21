  <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rumah</b> Cerdas</span>
    </div>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth::check() && Auth::user()->level == 'member')
              <img src="{{ asset('uploads/anggota/'.Auth::user()->member->image) }}" class="user-image" alt="User Image">
              @else
              <img src="{{ asset('adminlte/dist/img/user.jpg')}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(Auth::check() && Auth::user()->level == 'member')
                <img src="{{ asset('uploads/anggota/'.Auth::user()->member->image) }}" class="img-circle" alt="User Image">
                @else
                <img src="{{ asset('adminlte/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="{{ url('/keluar') }}" class="btn btn-default btn-flat">Sign out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>