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
                <i class="fa fa-file"></i> Read Proyek
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <h1 class="sub-header">Edit Proyek</h1>
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor SPK</label>
        <input class="form-control" name="spk" value="{{$proyek->spk}}" disabled="disabled">
      </div>
      <div class="form-group">
        <label>Nama Proyek</label>
        <input class="form-control" name="nama" disabled="disabled" value="{{$proyek->nm_proyek}} ">
      </div>
      <div class="form-group">
        <label>Jenis Proyek</label>
        <select name="jenis_proyek" class="form-control" selected="{{$proyek->jenis_proyek}}" disabled="disabled">
          <option value="0">Non Join Operation</option>
          <option value="1">Join Operation</option>
        </select>
      </div>
      <div class="form-group">
        <label>Type Proyek</label>
        <select name="type_proyek" class="form-control" selected="{{$proyek->jenis_proyek}}" disabled="disabled">
          <option value="0">Proyek Baru</option>
          <option value="1">Proyek Lama</option>
        </select>
      </div>
      <div class="form-group">
          <label>Tanggal Mulai</label>
          <div class='input-group date' id='datePicker'>
              <input name="tgl_proyek" type='text' class="form-control" value="{{$proyek->tgl_proyek}}" disabled="disabled"/>
          </div>
      </div>
      <div class="form-group">
        <label>Tanggal Selesai</label>
          <div class='input-group date' id='datePickertwi'>
              <input name="tgl_akhir"  type='text' class="form-control" value="{{$proyek->tgl_akhir}}" disabled="disabled">
          </div>
      </div>
</div>
</div>
@stop