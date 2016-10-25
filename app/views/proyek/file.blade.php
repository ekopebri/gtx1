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
                <i class="fa fa-file"></i> Download File Proyek
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
              <h1 class="sub-header">Isi Tabel</h1>
              <?php echo Session::get('message'); ?>
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <td>No</td>
                  <td>Nama File</td>
                  <td>Nama Proyek</td>
                  <td>Tanggal</td>
                  <td></td>
                </tr>
                <?php $i = 0; ?>
                @foreach($file as $data)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->filename}}</td>
                  <td>{{$data->proyek->nm_proyek}}</td>
                  <td>{{$data->date}}</td>
                  <td>
                  	<a href="{{ URL::to('admin/proyek/file/get', $data->filename) }}" ><i class="fa fa-download"></i> Download</a>
                  	<a href="{{ URL::to('admin/proyek/file/delete', $data->filename) }}"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>
  </div>
  <div align="center">
          {{$file->links()}}
          </div>
</div>
@stop