@extends('template/master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    {{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
    <h1 class="page-header">
      Halaman
      <small>Proyek</small>
    </h1>
    <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> index
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
              <h1 class="sub-header">Isi Tabel</h1>
            <div class="table-responsive">
              <button class="btn btn-default"><a href="{{ route('createproyek') }}"><i class="fa fa-plus"></i> Tambah Data</a></button>
              <br>
              <table class="table table-bordered table-striped">
                <tr style="font-weight:bold; text-align:center;">
                  <td>No</td>
                  <td>SPK</td>
                  <td>Nama Proyek</td>
                  <td>Jenis Proyek</td>
                  <td>Type Proyek</td>
                  <td>Tanggal Mulai</td>
                  <td>Tanggal Selesai</td>
                  <td></td>
                </tr>
                <?php $i = 0; ?>
                @foreach($proyek as $data)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->spk}}</td>
                  <td>{{$data->nm_proyek}}</td>
                  <td>{{$data->jenis_proyek}}</td>
                  <td>{{$data->type_proyek}}</td>
                  <td>{{$data->tgl_proyek}}</td>
                  <td>{{$data->tgl_akhir}}</td>
                  <td>
                    <a href="{{ route('readproyek', $data->id) }}" class="btn"><i class="fa fa-eye"></i> Read</a>
                    <a href="{{ route('editproyek', $data->id) }}" class="btn"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ route('deleteproyek', $data->id) }}" class="btn"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>
  </div>
  <div align="center">
  {{$proyek->links()}}
  </div>
</div>
@stop