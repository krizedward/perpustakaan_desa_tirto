  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(Auth::check() && Auth::user()->level == 'member')
          <img src="{{ asset('uploads/anggota/'.Auth::user()->member->image) }}" class="img-circle" alt="User Image">
          @else
          <img src="{{ asset('adminlte/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
          <li class="{{ set_active('home.admin') }}">
            <a href="{{ route('home.admin') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          
          @if(Auth::user()->level == 'staff')
          
          <li class="header">DATA MASTER</li>

          <li class="{{ set_active(['category.index','category.create','category.edit']) }}">
            <a href="{{ url('/kategori')}}">
              <i class="fa fa-th-large"></i> <span>Kategori</span>
            </a>
          </li>
          
          <li class="{{ set_active(['book.index','book.detail','book.create','book.show','book.edit']) }}">
            <a href="{{ route('book.index') }}">
              <i class="fa fa-book"></i> <span>Buku</span>
            </a>
          </li>

          <li class="{{ set_active(['member.index','member.create','member.show','member.edit']) }}">
            <a href="{{ route('member.index')}}">
              <i class="fa fa-users"></i> <span>Anggota</span>
            </a>
          </li>

          <li class="header">PERPUSTAKAAN</li>
          
          <li class="{{ set_active(['borrow.index','borrow.create']) }}">
            <a href="{{ route('borrow.index')}}">
              <i class="fa fa-book"></i> <span>Peminjaman</span>
            </a>
          </li>

          <li class="{{ set_active('borrow.return') }}">
            <a href="{{ url('/kembali')}}">
              <i class="fa fa-book"></i> <span>Pengembalian</span>
            </a>
          </li>

          <li class="header">Tambahan</li>

          <li class="{{ set_active(['collectionlink.index','collectionlink.create','collectionlink.edit']) }}">
            <a href="{{ route('collectionlink.index')}}">
              <i class="fa fa-book"></i> <span>Koleksi Link Video</span>
            </a>
          </li>

          <li class="{{ set_active(['banner.index','banner.create','banner.edit']) }}">
            <a href="{{ route('banner.index')}}">
              <i class="fa fa-book"></i> <span>Banner</span>
            </a>
          </li>

        @elseif(Auth::user()->level == 'member' && Auth::user()->status == 'active' )
        <li class="header">DATA MEMBER</li>
         
          <li class="{{ set_active(['book.index']) }}">
            <a href="{{ url('/buku')}}">
              <i class="fa fa-book"></i> <span>Buku</span>
            </a>
          </li>

          <li class="{{ set_active(['order.index','borrow.create']) }}">
            <a href="{{ route('order.index')}}">
              <i class="fa fa-book"></i> <span>Pesan Buku</span>
            </a>
          </li>

          <li class="{{ set_active(['borrow.index']) }}">
            <a href="{{ url('/pinjam')}}">
              <i class="fa fa-book"></i> <span>Pinjam Buku</span>
            </a>
          </li>

          <li class="{{ set_active(['borrow.return']) }}">
            <a href="{{ url('/kembali')}}">
              <i class="fa fa-book"></i> <span>Buku Kembali</span>
            </a>
          </li>

        <li class="header">Tambahan</li>

          <li class="{{ set_active(['collectionlink.index','collectionlink.create','collectionlink.edit']) }}">
            <a href="{{ route('collectionlink.index')}}">
              <i class="fa fa-book"></i> <span>Koleksi Link Video</span>
            </a>
          </li>
        @elseif(Auth::user()->level == 'member' && Auth::user()->status == 'unactive')
          <li class="header">Daftar</li>
          <li class="{{ set_active(['member.edit']) }}">
            <a href="{{ route('member.edit',[Auth::user()->id])}}">
              <i class="fa fa-book"></i> <span>Registrasi Akun</span>
            </a>
          </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->