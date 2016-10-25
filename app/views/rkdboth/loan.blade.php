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
                <i class="fa fa-file"></i> Permintaan Dana
            </li>
        </ol>
    {{Form::open(array('action' => 'PrintController@printLoan'))}}
      <input type="hidden" value="{{$month}}" name="month">
      <input type="hidden" value="{{$year}}" name="year">
      <button class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Page</button>
    {{Form::close()}}
    {{Form::open(array('action' => 'PrintController@saveLoan'))}}
      <input type="hidden" value="{{$month}}" name="month">
      <input type="hidden" value="{{$year}}" name="year">      
      <button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Page</button>
    {{Form::close()}}
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3 class="sub-header">Permintaan Pinjaman Dana Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'KonsolidasiController@cashin')) }}
      <table class="table table-bordered">
        <tr style="font-weight:bold; text-align:center;">
          <td rowspan="2">SPK</td>
          <td rowspan="2">Nama Proyek</td>
          <td rowspan="2">Cash In</td>
          <td rowspan="2">Cash Out</td>
          <td rowspan="2">Posisi Surpl/ def Proyek Awal Bulan</td>
          <td colspan="3">Pembayaran Cash Di Proyek</td>
          <td colspan="3">Pembayaran Via Departemen dan Pusat</td>
          <td rowspan="2">Surplus/Defisit Stlh Dropping</td>
          <td rowspan="2">Keterangan</td>
        </tr>
        <tr style="font-weight:bold; text-align:center;">
          <td>Minggu 1/2</td>
          <td>Minggu 3/4</td>
          <td bgcolor='#97C9F5'>Disetujui</td>
          <td>Konvensional</td>
          <td>Fasilitas Bank</td>
          <td bgcolor='#97C9F5'>Disetujui</td>
        </tr>
        <tr>
          <td colspan="13">Proyek</td>
        </tr>
        @foreach($loan as $data)
        <tr>
          <td>{{ $data->proyek->spk }}</td>
          <td>{{ $data->proyek->nm_proyek }}</td>
          <td>{{ number_format($data->cash_in) }}</td>
          <td>{{ number_format($data->cash_out) }}</td>
          <td>
            <?php
              $stra = $data->cash_in - $data->cash_out;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo number_format($stra);
              }
            ?>
          </td>
          <td>{{ number_format($data->cash_dwi1) }}</td>
          <td>{{ number_format($data->cash_dwi2) }}</td>
          <td bgcolor='#97C9F5'>
            <span class="cash_out" data-type="text" data-pk="{{ $data->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='accept_cashdwi'>
              {{ number_format($data->accept_cashdwi) }}
            </span></td>
          <td>{{ number_format($data->cash_konvensional) }}</td>
          <td>{{ number_format($data->cash_bank) }}</td>
          <td bgcolor='#97C9F5'>
            <span class="cash_out" data-type="text" data-pk="{{ $data->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='accept_cashkon'>
              {{ number_format($data->accept_cashkon) }}
            </span>
          </td>
          <td><?php $dataloan = $data->cash_in - $data->cash_out - $data->accept_cashdwi - $data->accept_cashkon;
            $dataTermin1 = Termin::where('proyek_id', '=', $data->proyek->id)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $data)
                            {
                              $query->where('proyek_id', '=', $data->proyek->id)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi1');
            $dataTermin2 = Termin::where('proyek_id', '=', $data->proyek->id)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $data)
                            {
                              $query->where('proyek_id', '=', $data->proyek->id)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi2');
                        $strb = $dataloan + $dataTermin1 + $dataTermin2;
              if ($strb < 0) {
                $strb = str_replace('-', '', ($strb));
                echo '('.number_format($strb).')';
              } else {
                echo number_format($strb);
              }
          ?></td>
          <td>{{ $data->ket }}</td>
        </tr>
        @endforeach
        @foreach($noLoan as $data)
        <tr>
          <td><font color="red">{{ $data->spk }}</font></td>
          <td><font color="red">{{ $data->nm_proyek }}</font></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td bgcolor='#97C9F5'></td>
          <td></td>
          <td></td>
          <td bgcolor='#97C9F5'></td>
          <td></td>
          <td></td>
        </tr>
        @endforeach
        <tr>
          <td colspan="2">Jumlah Pinjaman Proyek</td>
          <td>{{ number_format($cash_in) }}</td>
          <td>{{ number_format($cash_out) }}</td>
          <td><?php
            $strc = $cash_in - $cash_out;
              if ($strc < 0) {
                $strc = str_replace('-', '', ($strc));
                echo '('.number_format($strc).')';
              } else {
                echo number_format($strc);
              }
              ?></td>
          <td>{{ number_format($cash_dwi1) }}</td>
          <td>{{ number_format($cash_dwi2) }}</td>
          <td bgcolor='#97C9F5'>{{ number_format($accept_cashdwi) }}</td>
          <td>{{ number_format($cash_konvensional) }}</td>
          <td>{{ number_format($cash_bank) }}</td>
          <td bgcolor='#97C9F5'>{{ number_format($accept_cashkon) }}</td>
          <td><?php $dataloan = $cash_in - $cash_out - $accept_cashdwi - $accept_cashkon;
          $dataTermin1 = Termin::whereIn('proyek_id', $loan_get)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $loan_get)
                            {
                              $query->whereIn('proyek_id', $loan_get)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi1');
            $dataTermin2 = Termin::whereIn('proyek_id', $loan_get)
                            ->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
                            ->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
                            ->orWhere(function($query) use($month, $year, $loan_get)
                            {
                              $query->whereIn('proyek_id', $loan_get)
                                  ->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
                                  ->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
                              })
                        ->sum('cash_dwi2');
                        $strd = $dataloan + $dataTermin1 + $dataTermin2;
              if ($strd < 0) {
                $strd = str_replace('-', '', ($strd));
                echo '('.number_format($strd).')';
              } else {
                echo number_format($strd);
              }

          ?></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="11">Divisi</td>
        </tr>
        @foreach($loandiv as $data)
        <tr>
          <td>{{ $data->div->spk }}</td>
          <td>{{ $data->div->nm_divisi }}</td>
          <td>{{ number_format($data->cash_in) }}</td>
          <td>{{ number_format($data->cash_out) }}</td>
          <td>
            <?php 
            $dataSurplus = $cash_ind - $cash_outd;
            if ($dataSurplus < 0) {
              $strd = str_replace('-', '', ($dataSurplus));
              echo '('.number_format($strd).')';
            } else {
              echo number_format($dataSurplus);
            }
            ?>
          <td>{{ number_format($data->cash_dwi1) }}</td>
          <td>{{ number_format($data->cash_dwi2) }}</td>
          <td bgcolor='#97C9F5'>-</td>
          <td>{{ number_format($data->cash_konvensional) }}</td>
          <td>{{ number_format($data->cash_bank) }}</td>
          <td bgcolor='#97C9F5'>-</td>
          <td>
            <?php 
              $dataloand = $cash_ind - $cash_outd - $cash_dwi1d - $cash_dwi2d - $cash_konvensionald - $cash_bankd;
            if ($dataloand < 0) {
              $stra = str_replace('-', '', ($dataloand));
              echo '('.number_format($stra).')';
            } else {
              echo number_format($dataloand);
            }
            ?>
          </td>
          <td>{{ $data->ket }}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="2">Jumlah Pinjaman Divisi</td>
          <td>{{ number_format($cash_ind) }}</td>
          <td>{{ number_format($cash_outd) }}</td>
          <td>
            <?php 
            $dataSurplus = $cash_ind - $cash_outd;
            if ($dataSurplus < 0) {
              $strd = str_replace('-', '', ($dataSurplus));
              echo '('.number_format($strd).')';
            } else {
              echo number_format($dataSurplus);
            }
            ?>
          </td>
          <td>{{ number_format($cash_dwi1d) }}</td>
          <td>{{ number_format($cash_dwi2d) }}</td>
          <td bgcolor='#97C9F5'>-</td>
          <td>{{ number_format($cash_konvensionald) }}</td>
          <td>{{ number_format($cash_bankd) }}</td>
          <td bgcolor='#97C9F5'>-</td>
          <td>
            <?php 
            $dataloand = $cash_ind - $cash_outd - $cash_dwi1d - $cash_dwi2d - $cash_konvensionald - $cash_bankd;
            if ($dataloand < 0) {
              $strb = str_replace('-', '', ($dataloand));
              echo '('.number_format($strb).')';
            } else {
              echo number_format($dataloand);
            }
            ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2">Total</td>
          <td>{{ number_format($cash_in + $cash_ind) }}</td>
          <td>{{ number_format($cash_out + $cash_outd) }}</td>
          <td>
            <?php 
            $datatotSurplus = $cash_in - $cash_out + $cash_ind - $cash_outd;
            if ($datatotSurplus < 0) {
              $strf = str_replace('-', '', ($datatotSurplus));
              echo '('.number_format($strf).')';
            } else {
              echo number_format($datatotSurplus);
            }
            ?>
          </td>
          <td>{{ number_format($cash_dwi1 + $cash_dwi1d) }}</td>
          <td>{{ number_format($cash_dwi2 + $cash_dwi2d) }}</td>
          <td bgcolor='#97C9F5'>{{ number_format($accept_cashdwi) }}</td>
          <td>{{ number_format($cash_konvensional + $cash_konvensionald) }}</td>
          <td>{{ number_format($cash_bank + $cash_bankd) }}</td>
          <td bgcolor='#97C9F5'>{{ number_format($accept_cashkon) }}</td>
          <td>
            <?php 
            $dataTot = $dataloand + $dataTermin1 + $dataTermin2 + $dataloan;
            if ($dataTot < 0) {
              $strc = str_replace('-', '', ($dataTot));
              echo '('.number_format($strc).')';
            } else {
              echo number_format($dataTot);
            }
            ?>
          </td>
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