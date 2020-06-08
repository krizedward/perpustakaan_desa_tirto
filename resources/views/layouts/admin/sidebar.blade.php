  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
          <li class="{{ (Request::path() == 'dashboard') ? 'active' : '' }}">
            <a href="{{ url('/dashboard')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          
          @if(Auth::user()->level == 'staff')
          
          <li class="header">DATA MASTER</li>

          <li class="{{ (Request::path() == 'kategori') ? 'active' : '' }}">
            <a href="{{ url('/kategori')}}">
              <i class="fa fa-book"></i> <span>Kategori</span>
            </a>
          </li>
          
          <li class="{{ (Request::path() == 'buku') ? 'active' : '' }}">
            <a href="{{ url('/buku')}}">
              <i class="fa fa-th-large"></i> <span>Buku</span>
            </a>
          </li>

          <li class="{{ (Request::path() == 'anggota') ? 'active' : '' }}">
            <a href="{{ url('/anggota')}}">
              <i class="fa fa-th-large"></i> <span>Anggota</span>
            </a>
          </li>

          <li class="header">PERPUSTAKAAN</li>
          
          <li class="{{ (Request::path() == 'pinjam') ? 'active' : '' }}">
            <a href="{{ url('/pinjam')}}">
              <i class="fa fa-users"></i> <span>Peminjaman</span>
            </a>
          </li>

          <li class="{{ (Request::path() == 'kembali') ? 'active' : '' }}">
            <a href="{{ url('/kembali')}}">
              <i class="fa fa-users"></i> <span>Pengembalian</span>
            </a>
          </li>
        @else if(Auth::user()->level == 'member')
        <li class="header">DATA MEMBER</li>
         
          <li class="{{ (Request::path() == 'buku') ? 'active' : '' }}">
            <a href="{{ url('/buku')}}">
              <i class="fa fa-book"></i> <span>Buku</span>
            </a>
          </li>

          <li class="{{ (Request::path() == 'pinjam') ? 'active' : '' }}">
            <a href="{{ url('/pinjam')}}">
              <i class="fa fa-book"></i> <span>Peminjaman</span>
            </a>
          </li>

          <li class="{{ (Request::path() == 'kembali') ? 'active' : '' }}">
            <a href="{{ url('/kembali')}}">
              <i class="fa fa-book"></i> <span>Pengembalian</span>
            </a>
          </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->