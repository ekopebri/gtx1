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
                <i class="fa fa-file"></i> Omzet
            </li>
        </ol>
        {{Form::open(array('action' => 'PrintController@printOmzet'))}}
	      <input type="hidden" value="{{$month}}" name="month">
	      <input type="hidden" value="{{$year}}" name="year">
	      <button class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Page</button>
	    {{Form::close()}}
	    {{Form::open(array('action' => 'PrintController@saveOmzet'))}}
	      <input type="hidden" value="{{$month}}" name="month">
	      <input type="hidden" value="{{$year}}" name="year">      
	      <button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Page</button>
	    {{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	<h3 class="sub-header">Omset Penjualan Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
<div class="table-responsive">
{{ Form::open(array('action' => 'KonsolidasiController@selesai')) }}
	<table class="table table-bordered">
		<tr style="font-weight:bold; text-align:center;">
			<td rowspan="2">SPK</td>
			<td rowspan="2">Proyek</td>
			<td rowspan="2">RKP</td>
			<td rowspan="2">Ri Tahun {{$year-1}}</td>
			<td rowspan="2">Jumlah Tahun {{$year}}</td>
			<td colspan="12">Tahun {{$year}}</td>
			<td rowspan="2">Ra Tahun {{$year+1}}</td>
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
			<td colspan="2">Produksi Ekstern</td>
			<td>
				<?php
				if ($rkap == 0) {
					$rkap_percent = 0; 
					$percent_rkap = number_format( $rkap_percent * 100, 2 ) . '%';
					echo $percent_rkap;
				} else {
					$rkap_percent = $rkap/$rkap; 
					$percent_rkap = number_format( $rkap_percent * 100, 2 ) . '%';
					echo $percent_rkap;
				}
				
				?>
			</td>
			<td>
				<?php
				$percent_sblum = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '<', $year )			
			        ->sum('nilai_omzet');
				if ($total_omzet == 0) {
					$sblum_percent = 0; 
					$percent_sblum = number_format( $sblum_percent * 100, 2 ) . '%';
					echo $percent_sblum;
				} else {
					$sblum_percent = $percent_sblum/$total_omzet; 
					$percent_sblum = number_format( $sblum_percent * 100, 2 ) . '%';
					echo $percent_sblum;
				}
				
				?>
			</td>
			<td>
				<?php
				$total_th = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->sum('nilai_omzet');
				if ($total_omzet == 0) {
					$total_th = 0; 
					$th_total = number_format( $total_th * 100, 2 ) . '%';
					echo $th_total;
				} else {
					$total_th = $total_th/$total_omzet; 
					$th_total = number_format( $total_th * 100, 2 ) . '%';
					echo $th_total;
				}
				
				?>
			</td>
			<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$jan_percent = 0; 
					$percent_jan = number_format( $jan_percent * 100, 2 ) . '%';
					echo $percent_jan;
				} else {
					$jan_percent = $jan_omzet/$total_omzet; 
					$percent_jan = number_format( $jan_percent * 100, 2 ) . '%';
					echo $percent_jan;
				}
				
				?>
			</td>
			<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$feb_percent = 0; 
					$percent_feb = number_format( $feb_percent * 100, 2 ) . '%';
					echo $percent_feb;
				} else {
					$feb_percent = $feb_omzet/$total_omzet; 
					$percent_feb = number_format( $feb_percent * 100, 2 ) . '%';
					echo $percent_feb;
				}
				
				?>
			</td>
			<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$mar_percent = 0; 
					$percent_mar = number_format( $mar_percent * 100, 2 ) . '%';
					echo $percent_mar;
				} else {
					$mar_percent = $mar_omzet/$total_omzet; 
					$percent_mar = number_format( $mar_percent * 100, 2 ) . '%';
					echo $percent_mar;
				}
				
				?>
			</td>
			<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$apr_percent = 0; 
					$percent_apr = number_format( $apr_percent * 100, 2 ) . '%';
					echo $percent_apr;
				} else {
					$apr_percent = $apr_omzet/$total_omzet; 
					$percent_apr = number_format( $apr_percent * 100, 2 ) . '%';
					echo $percent_apr;
				}
				
				?>
			</td>
			<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$mei_percent = 0; 
					$percent_mei = number_format( $mei_percent * 100, 2 ) . '%';
					echo $percent_mei;
				} else {
					$mei_percent = $mei_omzet/$total_omzet; 
					$percent_mei = number_format( $mei_percent * 100, 2 ) . '%';
					echo $percent_mei;
				}
				
				?>
			</td>
			<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$jun_percent = 0; 
					$percent_jun = number_format( $jun_percent * 100, 2 ) . '%';
					echo $percent_jun;
				} else {
					$jun_percent = $jun_omzet/$total_omzet; 
					$percent_jun = number_format( $jun_percent * 100, 2 ) . '%';
					echo $percent_jun;
				}
				
				?>
			</td>
			<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$jul_percent = 0; 
					$percent_jul = number_format( $jul_percent * 100, 2 ) . '%';
					echo $percent_jul;
				} else {
					$jul_percent = $jul_omzet/$total_omzet; 
					$percent_jul = number_format( $jul_percent * 100, 2 ) . '%';
					echo $percent_jul;
				}
				
				?>
			</td>
			<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$agt_percent = 0; 
					$percent_agt = number_format( $agt_percent * 100, 2 ) . '%';
					echo $percent_agt;
				} else {
					$agt_percent = $agt_omzet/$total_omzet; 
					$percent_agt = number_format( $agt_percent * 100, 2 ) . '%';
					echo $percent_agt;
				}
				
				?>
			</td>
			<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$sep_percent = 0; 
					$percent_sep = number_format( $sep_percent * 100, 2 ) . '%';
					echo $percent_sep;
				} else {
					$sep_percent = $sep_omzet/$total_omzet; 
					$percent_sep = number_format( $sep_percent * 100, 2 ) . '%';
					echo $percent_sep;
				}
				
				?>
			</td>
			<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$okt_percent = 0; 
					$percent_okt = number_format( $okt_percent * 100, 2 ) . '%';
					echo $percent_okt;
				} else {
					$okt_percent = $okt_omzet/$total_omzet; 
					$percent_okt = number_format( $okt_percent * 100, 2 ) . '%';
					echo $percent_okt;
				}
				
				?>
			</td>
			<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$nov_percent = 0; 
					$percent_nov = number_format( $nov_percent * 100, 2 ) . '%';
					echo $percent_nov;
				} else {
					$nov_percent = $nov_omzet/$total_omzet; 
					$percent_nov = number_format( $nov_percent * 100, 2 ) . '%';
					echo $percent_nov;
				}
				
				?>
			</td>
			<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
				<?php
				if ($total_omzet == 0) {
					$des_percent = 0; 
					$percent_des = number_format( $des_percent * 100, 2 ) . '%';
					echo $percent_des;
				} else {
					$des_percent = $des_omzet/$total_omzet; 
					$percent_des = number_format( $des_percent * 100, 2 ) . '%';
					echo $percent_des;
				}
				
				?>
			</td>
			<td>
				<?php
				$percent_ssdah = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '>', $year )			
			        ->sum('nilai_omzet');

				if ($total_omzet == 0) {
					$ssdah_percent = 0; 
					$percent_ssdah = number_format( $ssdah_percent * 100, 2 ) . '%';
					echo $percent_ssdah;
				} else {
					$ssdah_percent = $percent_ssdah/$total_omzet; 
					$percent_ssdah = number_format( $ssdah_percent * 100, 2 ) . '%';
					echo $percent_ssdah;
				}
				
				?>
			</td>
			<td>
				<?php
				if ($total_omzet == 0) {
					$total_percent = 0; 
					$percent_total = number_format( $total_percent * 100, 2 ) . '%';
					echo $percent_total;
				} else {
					$total_percent = $total_omzet/$total_omzet; 
					$percent_total = number_format( $total_percent * 100, 2 ) . '%';
					echo $percent_total;
				}
				
				?>
			</td>
		</tr>
		@foreach($omzet as $data)
		<tr>
			<td>{{ $data->proyek->spk }}</td>
			<td>{{ $data->proyek->nm_proyek }}</td>
			<td>
				{{ number_format($data->proyeksi) }}
			</td>
			<td>
				<?php
				$sblum_tahun = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('YEAR(tgl_omzet)'), '<', $year )			
			        ->sum('nilai_omzet');
			    echo number_format($sblum_tahun);
				?>
			</td>
			<td>
				<?php
				$total_omzet_th = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->sum('nilai_omzet');
			    echo number_format($total_omzet_th);
				?>
			</td>
			<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$jan = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($jan);
				?> 
			</td>
			<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$feb = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($feb);
				?>
			</td>
			<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$mar = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($mar);
				?>
			</td>
			<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$apr = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($apr);
				?>
			</td>
			<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$mei = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($mei);
				?>
			</td>
			<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$jun = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($jun);
				?>
			</td>
			<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$jul = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($jul);
				?>
			</td>
			<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$agt = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($agt);
				?>
			</td>
			<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$sep = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($sep);
				?>
			</td>
			<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$okt = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($okt);
				?>
			</td>
			<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$nov = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($nov);
				?>
			</td>
			<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
				<?php
				$des = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->pluck('nilai_omzet');
			    echo number_format($des);
				?>
			</td>
			<td>
				<?php
				$ssdah_tahun = Omzetd::where('proyek_id','=',$data->proyek->id)
					->where(DB::raw('YEAR(tgl_omzet)'), '>', $year )			
			        ->sum('nilai_omzet');
			    echo number_format($ssdah_tahun);
				?>
			</td>
			<td>
				<?php
				$total = Omzetd::where('proyek_id','=',$data->proyek->id)			
			        ->sum('nilai_omzet');
			    echo number_format($total);
				?>
			</td>
		</tr>
		@endforeach
		@foreach($noOmzet as $data)
		<tr>
			<td><font color="red">{{ $data->spk }}</font></td>
			<td><font color="red">{{ $data->nm_proyek }}</font></td>
			<td></td>
			<td></td>
			<td></td>
			<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> ></td>
			<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> ></td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="2">Penjualan / Termin</td>
			<td>{{ number_format($rkap) }}</td>
			<td>
				<?php
				$sblum_total = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '<', $year )			
			        ->sum('nilai_omzet');
			    echo number_format($sblum_total);
				?>
			</td>
			<td>
				<?php
				$total_th_omzet = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
			        ->sum('nilai_omzet');
			    echo number_format($total_th_omzet);
				?>
			</td>
			<td>{{ number_format($jan_omzet) }}</td>
			<td>{{ number_format($feb_omzet) }}</td>
			<td>{{ number_format($mar_omzet) }}</td>
			<td>{{ number_format($apr_omzet) }}</td>
			<td>{{ number_format($mei_omzet) }}</td>
			<td>{{ number_format($jun_omzet) }}</td>
			<td>{{ number_format($jul_omzet) }}</td>
			<td>{{ number_format($agt_omzet) }}</td>
			<td>{{ number_format($sep_omzet) }}</td>
			<td>{{ number_format($okt_omzet) }}</td>
			<td>{{ number_format($nov_omzet) }}</td>
			<td>{{ number_format($des_omzet) }}</td>
			<td>
				<?php
				$ssdah_total = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '>', $year )	
			        ->sum('nilai_omzet');
			    echo number_format($ssdah_total);
				?>
			</td>
			<td>{{ number_format($total_omzet) }}</td>
		</tr>
	</table>
    {{ Form::submit('Selanjutnya') }}
{{Form::close() }}
	</div>
</div>
@stop