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
                <i class="fa fa-file"></i> Loan
            </li>
        </ol>
    <button class="btn pull-right" onclick='window.location.reload(true);'>
      <i class="fa fa-refresh"></i> Reload Page
    </button>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3 class="sub-header">Permintaan Pinjaman Dana Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; //output: May?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'ProyekController@cashin')) }}
      <table class="table table-bordered">
        <tr style="font-weight:bold; align:center;">
          <td rowspan="2" style="min-width:60px;">SPK</td>
          <td rowspan="2" style="min-width:150px;">Nama Proyek</td>
          <td rowspan="2" style="min-width:80px;">Cash In</td>
          <td rowspan="2" style="min-width:50px;">Cash Out</td>
          <td rowspan="2" style="min-width:50px;">Posisi Surpl/ def Proyek Awal Bulan</td>
          <td colspan="2" style="min-width:50px;">Pembayaran Cash Di Proyek</td>
          <td colspan="2" style="min-width:50px;">Pembayaran Via Departemen dan Pusat</td>
          <td rowspan="2" style="min-width:50px;">Surplus/Defisit Stlh Dropping</td>
          <td rowspan="2" style="min-width:50px;">Keterangan</td>
        </tr>
        <tr style="font-weight:bold; align:center;">
          <td>Minggu 1/2</td>
          <td>Minggu 3/4</td>
          <td>Konvensional</td>
          <td>Fasilitas Bank</td>
        </tr>
        <tr>
          <td>{{ $loan->proyek->spk }}</td>
          <td>{{ $loan->proyek->nm_proyek }}</td>
          <td>
            <span class="cash_in" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_in'>
                        {{ $loan->cash_in }}
            </span>
          </td>
          <td>
            <span class="cash_out" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_out'>
                        {{ $loan->cash_out }}
                      </span>
                    </td>
          <td>
            <span class="surplus">
              <?php
              $stra = $loan->cash_in - $loan->cash_out;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo number_format($stra);
              }
            ?>
            </span>
          </td>
          <td>
            <span class="loancash_dwi1" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_dwi1'>
                        {{ $loan->cash_dwi1 }}
                      </span>
                    </td>
          <td>
            <span class="loancash_dwi2" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_dwi2'>
                        {{ $loan->cash_dwi2 }}
                      </span>
                    </td>
          <td>
            <span class="loan_konvensional" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_konvensional'>
                        {{ $loan->cash_konvensional }}
                      </span>
                    </td>
          <td>
            <span class="loan_bank" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='cash_bank'>
                        {{ $loan->cash_bank }}
                      </span>
                    </td>
          <td>
            <?php
              $stra = $loan->cash_in - $loan->cash_out - $loan->cash_dwi1 - $loan->cash_dwi2 - $loan->cash_konvensional - $loan->cash_bank + $termin;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo number_format($stra);
              }
            ?>
            </span>
          </td>
          <td>
            <span class="ket" data-type="text" data-pk="{{ $loan->id }}" data-url="{{ url('admin/proyek/loan/update') }}" data-title="Enter Value" data-name='ket'>
                        {{ $loan->ket }}
                      </span>
                    </td>
        </tr>
        <tr>
          <td colspan="2" align="center">Jumlah</td>
          <td>
            <span id="cash_in">
              {{ number_format($loan->cash_in) }}
            </span>
          </td>
          <td>
            <span id="cash_out">
              {{ number_format($loan->cash_out) }}
            </span>
          </td>
          <td>
            <span id="surplus">
             <?php
              $stra = $loan->cash_in - $loan->cash_out;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo number_format($stra);
              }
            ?>
            </span>
          </td>
          <td>
            <span id="loancash_dwi1">
              {{ number_format($loan->cash_dwi1) }}
            </span>
          </td>
          <td>
            <span id="loancash_dwi2">
              {{ number_format($loan->cash_dwi2) }}
            </span>
          </td>
          <td>
            <span id="loan_konvensional">
              {{ number_format($loan->cash_konvensional) }}
            </span>
          </td>
          <td>
            <span id="loan_bank">
              {{ number_format($loan->cash_bank) }}
            </span>
          </td>
          <td>
            <span id="after_surplus">
              <?php
              $stra = $loan->cash_in - $loan->cash_out - $loan->cash_dwi1 - $loan->cash_dwi2 - $loan->cash_konvensional - $loan->cash_bank + $termin;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo number_format($stra);
              }
            ?>
            </span>
          </td>
          <td></td>
        </tr>
      </table>
            {{ Form::hidden('id', $loan->proyek->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Selanjutnya') }}
          {{Form::close() }}
  </div>
</div>
@stop