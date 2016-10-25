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
                <i class="fa fa-file"></i> index
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
            <h1 class="sub-header">Isi Tabel</h1>
            @if(Session::has('pesan'))
                {{ Session::get('pesan') }}
            @endif
            <div class="table-responsive">
              <button class="btn btn-default"><a href="{{ route('createdivisi') }}"><i class="fa fa-plus"></i> Tambah Data</a></button>
              <table class="table table-bordered table-striped">
                <tr style="font-weight:bold; text-align:center;">
                  <td>No</td>
                  <td>SPK</td>
                  <td>Nama Proyek</td>
                  <td>Wilayah</td>
                  <td></td>
                </tr>
                <?php $i = 0; ?>
                @foreach($divisi as $data)
                <?php $i++; ?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$data->spk}}</td>
                  <td>{{$data->nm_divisi}}</td>
                  <td>{{$data->wilayah}}</td>
                  <td>
                    <a href="{{ route('readdivisi', $data->id) }}" class="btn"><i class="fa fa-eye"></i> Read</a>
                    <a href="{{ route('editdivisi', $data->id) }}" class="btn"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{ route('deletedivisi', $data->id) }}" class="btn"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                @endforeach
              </table>
          </div>
          <div align="center">
          {{$divisi->links()}}
          </div>
  </div>
</div>
@stop