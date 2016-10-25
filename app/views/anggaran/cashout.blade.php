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
<h3 class="sub-header">Anggaran Cash Out Tahun {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'AnggaranController@selesai')) }}
        <table class="table table-bordered">
          <tr style="font-weight:bold; text-align:center;">
            <td rowspan="2">SPK</td>
            <td rowspan="2">Uraian</td>
            <td rowspan="2">RKP</td>
            <td rowspan="2">Ri Tahun {{$year-1}}</td>
            <td rowspan="2">Jumlah Tahun {{$year}}</td>
            <td colspan="12">Tahun {{$year}}</td>
            <td rowspan="2">Ra Tahun {{$year+1}}</td>
            <td rowspan="2">Total S/D Selesai</td>
          </tr>
          <tr style="font-weight:bold; text-align:center;">
            <td>Jan</td>
            <td>Feb</td>
            <td>Mar</td>
            <td>Apr</td>
            <td>Mei</td>
            <td>Jun</td>
            <td>Jul</td>
            <td>Agt</td>
            <td>Sep</td>
            <td>Okt</td>
            <td>Nop</td>
            <td>Des</td>
          </tr>
          <tr>
            <td></td>
            <td><?php if ($cashout->proyek->type_proyek == 0) {
              echo "<span font-color='red'>Proyek Baru</span>";
            } else {
              echo "Proyek Lama";
              } ?></td>
            <td colspan="17"></td>
          </tr>
          <tr>
            <td>{{ $cashout->proyek->spk }}</td>
            <td>{{ $cashout->proyek->nm_proyek }}</td>
            <td colspan="17"></td>
          </tr>
          <tr>
            <td></td>
            <td>   Pengeluaran Cash di proyek/droping</td>
            <td>
              <span class="cashout_proyek" data-type="text" data-pk="{{ $cashout->id }}" data-url="{{ url('admin/proyek/cashout/update') }}" data-title="Enter Value" data-name='cash_proyek'>
                          {{ $cashout->cash_proyek }}
                    </span>
                  </td>
            <td>
              <span class="cashout_sblump">
                {{ number_format($sblum_droping)}}
              </span>
            </td>
            <td>
              <span class="cashout_jump">
                {{ number_format($jumlah_p)}}
              </span>
            </td>
            <td>
              <span class="cashout_janp" data-type="text" data-pk="{{ $janp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$janp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_febp" data-type="text" data-pk="{{ $febp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$febp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_marp" data-type="text" data-pk="{{ $marp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$marp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_aprp" data-type="text" data-pk="{{ $aprp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$aprp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_meip" data-type="text" data-pk="{{ $meip->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$meip->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_junp" data-type="text" data-pk="{{ $junp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$junp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_julp" data-type="text" data-pk="{{ $julp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$julp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_agtp" data-type="text" data-pk="{{ $agtp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$agtp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_sepp" data-type="text" data-pk="{{ $sepp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$sepp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_oktp" data-type="text" data-pk="{{ $oktp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$oktp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_novp" data-type="text" data-pk="{{ $novp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$novp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_desp" data-type="text" data-pk="{{ $desp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$desp->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_ssdahp">
                {{ number_format($ssdah_droping)}}
              </span>
            </td>
            <td>
              <span class="cashout_totalp">
                {{ number_format($total_droping)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>   Pembayaran Tunai Via Departemen</td>
            <td>
              <span class="cashout_depar" data-type="text" data-pk="{{ $cashout->id }}" data-url="{{ url('admin/proyek/cashout/update') }}" data-title="Enter Value" data-name='cash_departemen'>
                          {{ $cashout->cash_departemen }}
                    </span>
                  </td>
            <td>
              <span class="cashout_sblumd">
                {{ number_format($sblum_depar)}}
              </span>
            </td>
            <td>
              <span class="cashout_jumd">
                {{ number_format($jumlah_d)}}
              </span>
            </td>
            <td>
              <span class="cashout_jand" data-type="text" data-pk="{{ $jand->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$jand->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_febd" data-type="text" data-pk="{{ $febd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$febd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_mard" data-type="text" data-pk="{{ $mard->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$mard->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_aprd" data-type="text" data-pk="{{ $aprd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$aprd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_meid" data-type="text" data-pk="{{ $meid->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$meid->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_jund" data-type="text" data-pk="{{ $jund->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$jund->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_juld" data-type="text" data-pk="{{ $juld->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$juld->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_agtd" data-type="text" data-pk="{{ $agtd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$agtd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_sepd" data-type="text" data-pk="{{ $sepd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$sepd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_oktd" data-type="text" data-pk="{{ $oktd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$oktd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_novd" data-type="text" data-pk="{{ $novd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$novd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_desd" data-type="text" data-pk="{{ $desd->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$desd->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_ssdahd">
                {{ number_format($ssdah_depar)}}
              </span>
            </td>
            <td>
              <span class="cashout_totald">
                {{ number_format($total_depar)}}
              </span>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>   Pembayaran Via Fasilitas</td>
            <td>
              <span class="cashout_fasilitas" data-type="text" data-pk="{{ $cashout->id }}" data-url="{{ url('admin/proyek/cashout/update') }}" data-title="Enter Value" data-name='cash_fasilitas'>
                          {{ $cashout->cash_fasilitas }}
                    </span>
                  </td>
            <td>
              <span class="cashout_sblumf">
                {{ number_format($sblum_fasilitas)}}
              </span>
            </td>
            <td>
              <span class="cashout_jumf">
                {{ number_format($jumlah_f)}}
              </span>
            </td>
            <td>
              <span class="cashout_janf" data-type="text" data-pk="{{ $janf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$janf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_febf" data-type="text" data-pk="{{ $febf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$febf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_marf" data-type="text" data-pk="{{ $marf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$marf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_aprf" data-type="text" data-pk="{{ $aprp->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$aprf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_meif" data-type="text" data-pk="{{ $meif->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$meif->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_junf" data-type="text" data-pk="{{ $junf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$junf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_julf" data-type="text" data-pk="{{ $julf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$julf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_agtf" data-type="text" data-pk="{{ $agtf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$agtf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_sepf" data-type="text" data-pk="{{ $sepf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$sepf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_oktf" data-type="text" data-pk="{{ $oktf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$oktf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_novf" data-type="text" data-pk="{{ $novf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$novf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_desf" data-type="text" data-pk="{{ $desf->id }}" data-url="{{ url('admin/proyek/cashoutd/update') }}" data-title="Enter Value" data-name='nilai_cash_out'>
                          {{$desf->nilai_cash_out}}
                    </span>
                  </td>
            <td>
              <span class="cashout_ssdahf">
                {{ number_format($ssdah_fasilitas)}}
              </span>
            </td>
            <td>
              <span class="cashout_totalf">
                {{ number_format($total_fasilitas)}}
              </span>
            </td>
          </tr>
            <td colspan="2">Total</td>
            <td>
              <span id="cashout_pdf">
                {{ number_format($cashout->cash_proyek + $cashout->cash_departemen + $cashout->cash_fasilitas) }}
              </span>
            </td>
            <td>
              <span id="cashout_sblum">
                {{ number_format($sblum_droping+$sblum_fasilitas+$sblum_depar)}}
              </span>
            </td>
            <td>
              <span id="cashout_jumpdf">
                {{ number_format($jumlah_p+$jumlah_f+$jumlah_d)}}
              </span>
            </td>
            <td>
              <span id="cashout_jan">
              {{ number_format($janp->nilai_cash_out + $jand->nilai_cash_out + $janf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_feb">
              {{ number_format($febp->nilai_cash_out + $febd->nilai_cash_out + $febf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_mar">
              {{ number_format($marp->nilai_cash_out + $mard->nilai_cash_out + $marf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_apr">
              {{ number_format($aprp->nilai_cash_out + $aprd->nilai_cash_out + $aprf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_mei">
              {{ number_format($meip->nilai_cash_out + $meid->nilai_cash_out + $meif->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_jun">
              {{ number_format($junp->nilai_cash_out + $jund->nilai_cash_out + $junf->nilai_cash_out) }}
            </span>
            </td>
            <td>
              <span id="cashout_jul">
              {{ number_format($julp->nilai_cash_out + $juld->nilai_cash_out + $julf->nilai_cash_out) }}
              </span>
            </td>
            <td>
            <span id="cashout_agt">
              {{ number_format($agtp->nilai_cash_out + $agtd->nilai_cash_out + $agtf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_sep">
              {{ number_format($sepp->nilai_cash_out + $sepd->nilai_cash_out + $sepf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_okt">
              {{ number_format($oktp->nilai_cash_out + $oktd->nilai_cash_out + $oktf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_nov">
              {{ number_format($novp->nilai_cash_out + $novd->nilai_cash_out + $novf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_des">
              {{ number_format($desp->nilai_cash_out + $desd->nilai_cash_out + $desf->nilai_cash_out) }}
              </span>
            </td>
            <td>
              <span id="cashout_ssdah">
                {{ number_format($ssdah_depar+$ssdah_fasilitas+$ssdah_droping) }}
              </span>
            </td>
            <td>
              <span id="cashout_total">
                {{ number_format($total_proyeksi) }}
              </span>
            </td>
          </tr>
        </table>
              {{ Form::submit('Selesai') }}
      {{Form::close() }}
  </div>
</div>
@stop