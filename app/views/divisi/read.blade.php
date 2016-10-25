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
                <i class="fa fa-file"></i> Read Divisi
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    <h1 class="sub-header">Lihat Divisi</h1>
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor SPK</label>
        <input class="form-control" name="spk" value="{{$div->spk}}" disabled="disabled">     
    </div>
      <div class="form-group">
        <label>Nama Divisi</label>
        <input class="form-control" name="nama" value="{{$div->nm_divisi}}" disabled="disabled">
      </div>
      <div class="form-group">
        <label>Wilayah</label>
        <input class="form-control" name="wilayah" value="{{$div->wilayah}}" disabled="disabled">
      </div>
</div>
</div>
@stop