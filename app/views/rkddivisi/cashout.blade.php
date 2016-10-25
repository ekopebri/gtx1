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
                <i class="fa fa-file"></i> Cash Out
            </li>
        </ol>
        <button class="btn pull-right" onclick='window.location.reload(true);'>
          <i class="fa fa-refresh"></i> Reload Page
        </button>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
              <h3 class="sub-header">Cash Out Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
        <div class="table-responsive">
        <table class="table table-bordered">
          <tr style="font-weight:bold; text-align:center;">
            <td rowspan="2">SPK</td>
            <td rowspan="2">Uraian Biaya</td>
            <td rowspan="2">Proyeksi Tahun {{$year}}</td>
            <td rowspan="2">Ri s/d <?php setlocale(LC_TIME, 'id_ID'); $monthNum = $month - 1; $monthName = strftime("%B", mktime(0, 0, 0, $monthNum, 1)); echo $monthName;?> Tahun {{$year}}</td>
            <td colspan="12">Tahun {{$year}}</td>
            <td rowspan="2">Total S/D Selesai</td>
          </tr>
          <tr style="font-weight:bold; text-align:center;">
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >Jan</td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >Feb</td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >Mar</td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >Apr</td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >Mei</td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >Jun</td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >Jul</td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >Agt</td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >Sep</td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >Okt</td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >Nop</td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >Des</td>
          </tr>
          <tr>
            <td>{{ $cashoutdiv->div->spk }}</td>
            <td>{{ $cashoutdiv->div->nm_divisi }}</td>
            <td colspan="15"></td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA PEMASARAN</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='pemasaran'>
                {{$cashoutdiv->pemasaran}}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($pemasaran) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jana->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jana->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $feba->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$feba->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $mara->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$mara->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $apra->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$apra->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meia->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meia->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $juna->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$juna->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jula->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jula->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutdiv" data-type="text" data-pk="{{ $agta->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agta->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepa->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepa->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $okta->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$okta->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $nova->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$nova->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desa->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desa->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($a)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA SEKRETARIAT</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='sekretariat'>
                {{$cashoutdiv->sekretariat}}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($sekretariat) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $janb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$janb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $marb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$marb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $aprb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$aprb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meib->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meib->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $junb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$junb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $julb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$julb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agtb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agtb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $oktb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$oktb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $novb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$novb->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desb->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desb->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($b)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA FASILITAS</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='fasilitas'>
                {{$cashoutdiv->fasilitas}}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($fasilitas) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $janc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$janc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $marc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$marc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $aprc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$aprc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meic->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meic->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $junc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$junc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $julc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$julc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agtc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agtc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $oktc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$oktc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $novc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$novc->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desc->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desc->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($c)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA PERSONALIA</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='personalia'>
                {{$cashoutdiv->personalia}}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($personalia) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jand->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jand->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febd->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $mard->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$mard->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $aprd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$aprd->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meid->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meid->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jund->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jund->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $juld->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$juld->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agta->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agta->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepd->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $oktd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$oktd->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $novd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$novd->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desd->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desd->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($d)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA KEUANGAN</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='keuangan'>
                {{$cashoutdiv->keuangan}}
              </span>
            </td>
            <td>{{ number_format($keuangan) }}</td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jane->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jane->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febe->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febe->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $mare->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$mare->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $apre->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$apre->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meie->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meie->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $june->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$june->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jule->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jule->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agte->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agte->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepe->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepe->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $okte->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$okte->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $nove->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$nove->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $dese->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$dese->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($e)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA KENDARAAN</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='kendaraan'>
                          {{ $cashoutdiv->kendaraan }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($kendaraan) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $janf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$janf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $marf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$marf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $aprf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$aprf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meif->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meif->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $junf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$junf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $julf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$julf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agtf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agtf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $oktf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$oktf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $novf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$novf->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desf->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desf->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($f)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>BIAYA UMUM</td>
            <td>
              <span class="cashoutdiv" data-type="text" data-pk="{{ $cashoutdiv->id }}" data-url="{{ url('admin/divisi/cashoutdiv/update') }}" data-title="Enter Value" data-name='umum'>
                {{$cashoutdiv->umum}}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($umum) }}
              </span>
            </td>
            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jang->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jang->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $febg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$febg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $marg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$marg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $aprg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$aprg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $meig->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$meig->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $jung->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$jung->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $julg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$julg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $agtg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$agtg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $sepg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$sepg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $oktg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$oktg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $novg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$novg->nilai_cashout}}
                    </span>
                  </td>
            <td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
              <span class="cashoutddiv" data-type="text" data-pk="{{ $desg->id }}" data-url="{{ url('admin/divisi/cashoutddiv/update') }}" data-title="Enter Value" data-name='nilai_cashout'>
                          {{$desg->nilai_cashout}}
                    </span>
                  </td>
            <td>
              <span>
                {{number_format($g)}}
              </span>
            </td>
          </tr>
          <tr>
            <td colspan="2">Total</td>
            <td>
              <span>
                {{ number_format($ok_netto) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($proyeksi) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($jan) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($feb) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($mar) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($apr) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($mei) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($jun) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($jul) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($agt) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($sep) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($okt) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($nov) }}
              </span>
            </td>
            <td>
              <span>
                {{ number_format($des) }}
              </span>
            </td>
            <td>
              <span>
                {{number_format($a+$b+$c+$d+$e+$f+$g)}}
              </span>
            </td>
          </tr>
        </table>
        <!-- errors -->
        <p style="color: #c0392b">{{ $errors->first() }}</p>
        <hr>
        {{ Form::open(array('action' => 'DivisiController@selesai', 'files' => true )) }}
            {{ Form::file('document[]', ['multiple'=>true]) }}
            {{ Form::submit('Upload') }}          
            {{ Form::hidden('divisi_id', $cashoutdiv->div->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Submit') }}
      {{Form::close() }}
  </div>
</div>
@stop