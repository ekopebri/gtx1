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
    <h3 class="sub-header">Permintaan Pinjaman Dana Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'DivisiController@cashout')) }}
      <table class="table table-bordered">
        <tr style="font-weight:bold; text-align:center;">
          <td rowspan="2">SPK</td>
          <td rowspan="2">Nama Proyek</td>
          <td rowspan="2">Cash In</td>
          <td rowspan="2">Cash Out</td>
          <td rowspan="2">Posisi Surpl/ def Proyek Awal Bulan</td>
          <td colspan="2">Pembayaran Cash Di Proyek</td>
          <td colspan="2">Pembayaran Via Departemen dan Pusat</td>
          <td rowspan="2">Surplus/Defisit Stlh Dropping</td>
          <td rowspan="2">Keterangan</td>
        </tr>
        <tr style="font-weight:bold; text-align:center;">
          <td>Minggu 1/2</td>
          <td>Minggu 3/4</td>
          <td>Konvensional</td>
          <td>Fasilitas Bank</td>
        </tr>
        <tr>
          <td>{{ $loandiv->div->spk }}</td>
          <td>{{ $loandiv->div->nm_divisi }}</td>
          <td>
            <span class="loandiv_cashin" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_in'>
                        {{ $loandiv->cash_in }}
                  </span>
                </td>
          <td>
            <span class="loandiv_cashout" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_out'>
                        {{ $loandiv->cash_out }}
                      </span>
                    </td>
          <td>
            <span class="loandiv_surplus">
            <?php
              $stra = $loandiv->cash_in - $loandiv->cash_out;
              if ($stra < 0) {
                $stra = str_replace('-', '', ($stra));
                echo '('.number_format($stra).')';
              } else {
                echo $stra;
              }
              
            ?>
            </span>
          </td>
          <td>
            <span class="loandiv_cashdwi1" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_dwi1'>
                        {{ $loandiv->cash_dwi1 }}
                      </span>
                    </td>
          <td>
            <span class="loandiv_cashdwi2" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_dwi2'>
                        {{ $loandiv->cash_dwi2 }}
                      </span>
                    </td>
          <td>
            <span class="loandiv_konvensional" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_konvensional'>
                        {{ $loandiv->cash_konvensional }}
                      </span>
                    </td>
          <td>
            <span class="loandiv_bank" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='cash_bank'>
                        {{ $loandiv->cash_bank }}
                      </span>
                    </td>
          <td>
            <span class="loandiv_aftersurplus">
            <?php
            $strb = $loandiv->cash_in - $loandiv->cash_out - $loandiv->cash_dwi1 - $loandiv->cash_dwi2 - $loandiv->cash_konvensional - $loandiv->cash_bank;
            if ($strb < 0) {
              $strb = str_replace('-', '', ($strb));
              echo '('.number_format($strb).')';
            } else {
              echo number_format($strb);
            }
            ?>
            </span>
          </td>
          <td>
            <span class="ket" data-type="text" data-pk="{{ $loandiv->id }}" data-url="{{ url('admin/divisi/loan/update') }}" data-title="Enter Value" data-name='ket'>
                        {{ $loandiv->ket }}
                      </span>
                    </td>
        </tr>
        <tr>
          <td colspan="2" align="center">Jumlah</td>
          <td>
            <span id="loandiv_cashin">
              {{ number_format($loandiv->cash_in) }}
            </span>
          </td>
          <td>
            <span id="loandiv_cashout">
              {{ number_format($loandiv->cash_out) }}
            </span>
          </td>
          <td>
            <span id="loandiv_surplus">
            <?php
              $strc = $loandiv->cash_in - $loandiv->cash_out;
              if ($strc < 0) {
                $strc = str_replace('-', '', ($strc));
                echo '('.number_format($strc).')';
              } else {
                echo $strc;
              }
            ?>
            </span>
          </td>
          <td>
            <span id="loandiv_cashdwi1">
              {{ number_format($loandiv->cash_dwi1) }}
            </span>
          </td>
          <td>
            <span id="loandiv_cashdwi2">
              {{ number_format($loandiv->cash_dwi2) }}
            </span>
          </td>
          <td>
            <span id="loandiv_konvensional">
              {{ number_format($loandiv->cash_konvensional) }}
            </span>
          </td>
          <td>
            <span id="loandiv_bank">
              {{ number_format($loandiv->cash_bank) }}
            </span>
          </td>
          <td>
            <span id="loandiv_aftersurplus">
            <?php
            $strd = $loandiv->cash_in - $loandiv->cash_out - $loandiv->cash_dwi1 - $loandiv->cash_dwi2 - $loandiv->cash_konvensional - $loandiv->cash_bank;
            if ($strd < 0) {
              $strd = str_replace('-', '', ($strd));
              echo '('.number_format($strd).')';
            } else {
              echo number_format($strd);
            }
            ?>
            </span>
          </td>
          <td></td>
        </tr>
      </table>
            {{ Form::hidden('id', $loandiv->div->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Selanjutnya') }}
          {{Form::close() }}
  </div>
</div>
@stop