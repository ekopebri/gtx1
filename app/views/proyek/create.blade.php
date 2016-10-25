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
                <i class="fa fa-file"></i> Create Proyek
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    @if(Session::has('pesan'))
      {{ Session::get('pesan') }}
    @endif
    <h1 class="sub-header">Tambah Proyek</h1>
      {{ Form::open(array('route' => 'storeproyek', 'id' => 'eventForm', 'class' => 'form-horizontal')) }}
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor SPK</label>
        <input class="form-control" name="spk" placeholder="Masukkan Kode SPK">
        <br>
        @if($errors->has('spk'))
          {{ $errors->first('spk') }}
        @endif
      </div>
      <div class="form-group">
        <label>Nama Proyek</label>
        <input class="form-control" name="nama" placeholder="Masukkan Nama Proyek">
        <br>
        @if($errors->has('nama'))
          {{ $errors->first('nama') }}
        @endif
      </div>
      <div class="form-group">
        <label>Jenis Proyek</label>
        <select name="jenis_proyek" class="form-control">
          <option value="0">Non Join Operation</option>
          <option value="1">Join Operation</option>
        </select>
      </div>
      <div class="form-group">
        <label>Type Proyek</label>
        <select name="type_proyek" class="form-control">
          <option value="0">Proyek Baru</option>
          <option value="1">Proyek Lama</option>
        </select>
      </div>
      <div class="form-group">
          <label>Tanggal Mulai</label>
          <div class='input-group date' id='datePicker'>
              <input name="tgl_proyek" type='text' class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
          @if($errors->has('tgl_proyek'))
            {{ $errors->first('tgl_proyek') }}
          @endif
      </div>
      <div class="form-group">
        <label>Tanggal Selesai</label>
          <div class='input-group date' id='datePickertwi'>
              <input name="tgl_akhir"  value="0000-00-00" type='text' class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
          @if($errors->has('tgl_akhir'))
            {{ $errors->first('tgl_akhir') }}
          @endif
      </div>
            <button type="submit" class="btn btn-default">Save</button>
            {{Form::close()}}
</div>
</div>
@stop