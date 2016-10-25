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
                <i class="fa fa-file"></i> Termin
            </li>
        </ol>
    
    <button class="btn pull-right" onclick='window.location.reload(true);'>
      <i class="fa fa-refresh"></i> Reload Page
    </button>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3 class="sub-header">Penerimaan Termin Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1));
    echo $monthName; //output: May
    ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'ProyekController@loan')) }}
            <table class="table table-bordered">
              <tr style="font-weight:bold; text-align:center;">
                <td>SPK</td>
                <td>Nama Proyek</td>
                <td>Dwi Ming 1/2</td>
                <td>Dwi Ming 3/4</td>
                <td>Ri</td>
<td>Umur Piutang</td>
                <td>Belum Cair</td>
                <td>Keterangan</td>
              </tr>
              <tr>
                <td>{{ $termin->proyek->spk }}</td>
                <td>{{ $termin->proyek->nm_proyek }}</td>
                
                <td>
                  <span class="cash_dwi1" data-type="text" data-pk="{{ $termin->id }}" data-url="{{ url('admin/proyek/termin/update') }}" data-title="Enter Value" data-name='nama=cash_dwi1-month=<?php echo $month; ?>-year=<?php echo $year; ?>'>
                    {{ $termin->cash_dwi1 }}
                  </span>
                </td>
                <td>
                  <span class="cash_dwi2" data-type="text" data-pk="{{ $termin->id }}" data-url="{{ url('admin/proyek/termin/update') }}" data-title="Enter Value" data-name='nama=cash_dwi2-month=<?php echo $month; ?>-year=<?php echo $year; ?>'>
                    {{ $termin->cash_dwi2 }}
                  </span>
                </td>
                <td>
                  <span class="realisasi" data-type="text" data-pk="{{ $termin->id }}" data-url="{{ url('admin/proyek/termin/update') }}" data-title="Enter Value" data-name='nama=realisasi-month=<?php echo $month; ?>-year=<?php echo $year; ?>'>
                    {{ $termin->realisasi }}
                  </span>
                </td>
<td>
                  <span class="ket" data-type="text" data-pk="{{ $termin->id }}" data-url="{{ url('admin/proyek/termin/update') }}" data-title="Enter Value" data-name='umur'>
                     {{ $termin->umur }}
                  </span>
               </td>
                <td><span id="tambah">{{ number_format($termin->cash_dwi1 + $termin->cash_dwi2 - $termin->realisasi) }}</td></span>
                <td>
                  <span class="ket" data-type="text" data-pk="{{ $termin->id }}" data-url="{{ url('admin/proyek/termin/update') }}" data-title="Enter Value" data-name='ket'>
                     {{ $termin->ket }}
                  </span>
               </td>
              </tr>
              <tr>
                <td colspan="2"><center>Total Rencana Termyn</center></td>
                <td>
                  <span id="cash_dwi1">
                    {{ number_format($termin->cash_dwi1) }}
                  </span>
                </td>
                <td>
                  <span id="cash_dwi2">
                    {{ number_format($termin->cash_dwi2) }}
                  </span>
                </td>
                <td>
                  <span id="realisasi">
                    {{ number_format($termin->realisasi) }}
                  </span>
                </td>
<td></td>
                <td>
                  <span id="total_termin">
                    {{ number_format($termin->cash_dwi1 + $termin->cash_dwi2-$termin->realisasi) }}
                  </span>
                </td>
                <td></td>
              </tr>
              </tr>
            </table>
            {{ Form::hidden('id', $termin->proyek->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            
            {{ Form::submit('Selanjutnya') }}
          {{Form::close() }}
  </div>
</div>
@stop