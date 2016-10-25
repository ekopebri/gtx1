@extends('template/master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    {{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
    <h1 class="page-header">
      Halaman
      <small>Divisi</small>
    </h1>
    <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Create Divisi
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    @if(Session::has('pesan'))
      {{ Session::get('pesan') }}
    @endif
    <h1 class="sub-header">Tambah Divisi</h1>
      {{ Form::open(array('route' => 'storedivisi', 'id' => 'eventForm', 'class' => 'form-horizontal')) }}
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor SPK</label>
        <input class="form-control" name="spk" placeholder="Masukkan Kode SPK">
        <br>
        @if($errors->has('spk'))
          {{ $errors->first('spk') }}
        @endif
      </div>
      <div class="form-group">
        <label>Nama Divisi</label>
        <input class="form-control" name="nama" placeholder="Masukkan Nama Divisi">
        <br>
        @if($errors->has('nama'))
          {{ $errors->first('nama') }}
        @endif
      </div>
      <div class="form-group">
        <label>Wilayah</label>
        <input class="form-control" name="wilayah" placeholder="Masukkan wilayah Divisi">
        <br>
        @if($errors->has('wilayah'))
          {{ $errors->first('wilayah') }}
        @endif
      </div>
            <button type="submit" class="btn btn-default">Save</button>
            {{Form::close()}}
</div>
</div>
@stop