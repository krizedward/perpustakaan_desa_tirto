      <div class="row">
        <div class="col-md-12">
        <!-- Kategori Alert -->
        @if(Session::has('kategori_add'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('kategori_add')}}
          </div>
        @endif
        @if(Session::has('kategori_update'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('kategori_update')}}
          </div>
        @endif
        @if(Session::has('kategori_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('kategori_delete')}}
          </div>
        @endif
        <!-- Kategori Alert End -->

        <!-- Buku Alert -->
        @if(Session::has('buku_add'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('buku_add')}}
          </div>
        @endif
        @if(Session::has('buku_update'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('buku_update')}}
          </div>
        @endif
        @if(Session::has('buku_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('buku_delete')}}
          </div>
        @endif
        <!-- Buku Alert End -->

        <!-- Pinjam Alert -->
        @if(Session::has('pinjam_start'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('pinjam_start')}}
          </div>
        @endif
        @if(Session::has('pinjam_end'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('pinjam_end')}}
          </div>
        @endif
        <!-- Pinjam Alert End -->

        <!-- Pinjam Alert -->
        @if(Session::has('kembali_buku'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('kembali_buku')}}
          </div>
        @endif
        <!-- Pinjam Alert End -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->