@extends('template/master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    {{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
    <h1 class="page-header">
      Halaman
      <small>Konsolidasi</small>
    </h1>
    <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Termin
            </li>
        </ol>
    {{Form::open(array('action' => 'PrintController@printTermin'))}}
      <input type="hidden" value="{{$month}}" name="month">
      <input type="hidden" value="{{$year}}" name="year">
      <button class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Page</button>
    {{Form::close()}}
    {{Form::open(array('action' => 'PrintController@saveTermin'))}}
      <input type="hidden" value="{{$month}}" name="month">
      <input type="hidden" value="{{$year}}" name="year">      
      <button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Page</button>
    {{Form::close()}}
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3 class="sub-header">Penerimaan Termin Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName;
                ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'KonsolidasiController@loan')) }}
            <table class="table table-bordered">
              <tr style="font-weight:bold; text-align:center;">
                <td>SPK</td>
                <td>Nama Proyek</td>
                <td>Dwi Ming 1/2</td>
                <td>Dwi Ming 3/4</td>
                <td>Ri</td>
                <td>Belum Cair</td>
                <td>Keterangan</td>
              </tr>
              @foreach($termin as $data)
              <tr>
                <td>{{ $data->proyek->spk }}</td>
                <td>{{ $data->proyek->nm_proyek }}</td>
                <td>{{ number_format($data->cash_dwi1) }}</td>
                <td>{{ number_format($data->cash_dwi2) }}</td>
                <td>{{ number_format($data->realisasi) }}</td>
                <td>{{ number_format($data->cash_dwi1 + $data->cash_dwi2 - $data->realisasi) }}</td>
                <td>{{ $data->ket }}</td>
              </tr>
              @endforeach
              @foreach($noTermin as $data)
              <tr color="red">
                <td><font color="red">{{ $data->spk }}</font></td>
                <td><font color="red">{{ $data->nm_proyek }}</font></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2">Total Termin Konsolidasi</td>
                <td>{{ number_format($cash_dwi1) }}</td>
                <td>{{ number_format($cash_dwi2) }}</td>
                <td>{{ number_format($realisasi) }}</td>
                <td>{{ number_format($cash_dwi1 + $cash_dwi2 - $realisasi) }}</td>
                <td></td>
              </tr>
            </table>
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Selanjutnya') }}
          {{Form::close() }}
  </div>
</div>
@stop