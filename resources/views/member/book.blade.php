@extends('layouts.member')

@section('title','Buku')

@section('content')
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          List Koleksi Buku
          <small>pusdes</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            @foreach($data as $dt)
        <div class="col-md-3">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-body">
                <a href="#" data-toggle="modal" data-target="#{{$dt->id}}">
                    <img class="img-responsive pad" src="{{ url('uploads/'.$dt->image_cover)}}" alt="Photo">
                </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="modal modal-primary fade" id="">
          <div class="modal-dialog">
            <div class="modal-content">
            <!-- Profile Image -->
              <div class="box box-danger">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$dt->image_cover)}}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{$dt->title}}</h3>

                  <p class="text-muted text-center">{{ $dt->category->name}}</p>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.modal-content -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="{{$dt->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Buku</h4>
              </div>
              <div class="modal-body">
                <img class="profile-user-img img-responsive" src="{{ url('uploads/'.$dt->image_cover)}}" alt="User profile picture">

                  <h3 class="profile-username text-center">{{$dt->title}}</h3>

                  <p class="text-muted text-center">{{ $dt->category->name}}</p>
              </div>
              <div class="modal-footer">
                <p class="pull-left">
                    <b>Deskripsi : </b>{{ $dt->description}}
                </p>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        @endforeach
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
@endsection