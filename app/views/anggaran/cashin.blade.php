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
                <i class="fa fa-file"></i> Cash In
            </li>
        </ol>
    <button class="btn pull-right" onclick='window.location.reload(true);'>
      <i class="fa fa-refresh"></i> Reload Page
    </button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h3 class="sub-header">Realisasi Anggaran Cash In {{$year}} (Dalam jutaan)</h3>
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
					<td>Type Proyek = <?php if ($cashin->proyek->type_proyek == 0) {
						echo "Proyek Baru";
					} else {
						echo "Proyek Lama";
						} ?>
					</td>
					<td colspan="16"></td>
				</tr>
				<tr>
					<td>{{ $cashin->proyek->spk }}</td>
					<td>{{ $cashin->proyek->nm_proyek }}</td>
					<td>
						<span class="cashin_rkp" data-type="text" data-pk="{{ $cashin->id }}" data-url="{{ url('admin/proyek/cashin/update') }}" data-title="Enter Value" data-name='proyeksi'>
                    		{{ $cashin->proyeksi }}
            			</span>
            		</td>
            		<td>
            			<span class="cashin_sblum">
            				{{ number_format($proyeksi_sbelum) }}
            			</span>
            		</td>
            		<td>
            			<span class="cashin_th">
            				{{ number_format($jumlah_th) }}
            			</span>
            		</td>
					<td>
						<span class="cashin_jan" data-type="text" data-pk="{{ $jan->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $jan->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_feb" data-type="text" data-pk="{{ $feb->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $feb->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_mar" data-type="text" data-pk="{{ $mar->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $mar->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_apr" data-type="text" data-pk="{{ $apr->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $apr->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_mei" data-type="text" data-pk="{{ $mei->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $mei->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_jun" data-type="text" data-pk="{{ $jun->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $jun->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_jul" data-type="text" data-pk="{{ $jul->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $jul->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_agt" data-type="text" data-pk="{{ $agt->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $agt->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_sep" data-type="text" data-pk="{{ $sep->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $sep->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_okt" data-type="text" data-pk="{{ $okt->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $okt->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_nov" data-type="text" data-pk="{{ $nov->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $nov->nilai_cash_in }}
            			</span>
            		</td>
					<td>
						<span class="cashin_des" data-type="text" data-pk="{{ $des->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $des->nilai_cash_in }}
            			</span>
            		</td>
            		<td>
            			<span class="cashin_ssdah">
            				{{ number_format($proyeksi_ssdah) }}
            			</span>
            		</td>
            		<td>
            			<span class="cashin_total">
            				{{ number_format($total_proyeksi) }}
            			</span>
            		</td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td colspan="2">Total</td>
					<td>
						<span id="cashin_rkp">
							{{ number_format($cashin->proyeksi) }}
						</span>
					</td>
            		<td>
            			<span id="cashin_sblum">
            				{{ number_format($proyeksi_sbelum) }}
            			</span>
            		</td>
            		<td>
            			<span id="cashin_th">
            				{{ number_format($jumlah_th) }}
            			</span>
            		</td>
					<td>
						<span id="cashin_jan">
						{{ number_format($jan->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_feb">
						{{ number_format($feb->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_mar">
						{{ number_format($mar->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_apr">
						{{ number_format($apr->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_mei">
						{{ number_format($mei->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_jun">
						{{ number_format($jun->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_jul">
						{{ number_format($jul->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_agt">
						{{ number_format($agt->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_sep">
						{{ number_format($sep->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_okt">
						{{ number_format($okt->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_nov">
						{{ number_format($nov->nilai_cash_in) }}
						</span>
					</td>
					<td>
						<span id="cashin_des">
						{{ number_format($des->nilai_cash_in) }}
						</span>
					</td>
            		<td>
            			<span id="cashin_ssdah">
            			{{ number_format($proyeksi_ssdah) }}
	            		</span>
	            	</td>
            		<td>
            			<span id="cashin_total">
            				{{ number_format($total_proyeksi) }}
            			</span>
            		</td>
				</tr>
				<tr></tr>
			</table>
            {{ Form::submit('Selesai') }}
          	{{Form::close() }}
	</div>
</div>
@stop