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

          <li>
            <a href="{{ url('/dashboard')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li class="header">DATA MASTER</li>

          <li>
            <a href="{{ url('/kategori')}}">
              <i class="fa fa-book"></i> <span>Kategori</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
          
          <li>
            <a href="{{ url('/buku')}}">
              <i class="fa fa-th-large"></i> <span>Buku</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>
            <a href="{{ url('/anggota')}}">
              <i class="fa fa-th-large"></i> <span>Anggota</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li class="header">PERPUSTAKAAN</li>
          
          <li>
            <a href="{{ url('/pinjam')}}">
              <i class="fa fa-users"></i> <span>Peminjaman</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>

          <li>
            <a href="{{ url('/kembali')}}">
              <i class="fa fa-users"></i> <span>Pengembalian</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
          </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->