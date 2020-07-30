      <div class="row">
        <div class="col-md-12">
        <!-- Koleksi Alert -->
        @if(Session::has('koleksi_add'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('koleksi_add')}}
          </div>
        @endif

        @if(Session::has('koleksi_update'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('koleksi_update')}}
          </div>
        @endif

        @if(Session::has('koleksi_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('koleksi_delete')}}
          </div>
        @endif
        <!-- End Koleksi Alert -->
        <!-- Member Alert -->
        @if(Session::has('pesan_buku'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('pesan_buku')}}
          </div>
        @endif

        @if(Session::has('peringatan_pesan'))
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> {{ __('Peringatan!')}}</h4>
              {{ Session::get('peringatan_pesan')}}
          </div>
        @endif
        <!-- End Member Alert -->

        <!-- Anggota Alert-->
        @if(Session::has('active'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('active')}}
          </div>
        @endif

        @if(Session::has('unactive'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('unactive')}}
          </div>
        @endif

        @if(Session::has('anggota_add'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('anggota_add')}}
          </div>
        @endif

        @if(Session::has('anggota_update'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('anggota_update')}}
          </div>
        @endif

        @if(Session::has('anggota_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('anggota_delete')}}
          </div>
        @endif
        <!-- End Anggota Alert -->

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
        @if(Session::has('buku_update_error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-times"></i> {{ __('Tidak Berhasil!')}}</h4>
              {{ Session::get('buku_update_error')}}
          </div>
        @endif
        @if(Session::has('buku_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('buku_delete')}}
          </div>
        @endif
        @if(Session::has('buku_delete_error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-times"></i> {{ __('Tidak Berhasil!')}}</h4>
              {{ Session::get('buku_delete_error')}}
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

        <!-- Banner Alert -->
        @if(Session::has('banner_add'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('banner_add')}}
          </div>
        @endif
        @if(Session::has('banner_update'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('banner_update')}}
          </div>
        @endif
        @if(Session::has('banner_delete'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ __('Berhasil!')}}</h4>
              {{ Session::get('banner_delete')}}
          </div>
        @endif
        <!-- Banner Alert End -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->