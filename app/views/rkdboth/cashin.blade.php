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
                <i class="fa fa-file"></i> Cash In
            </li>
        </ol>
        {{Form::open(array('action' => 'PrintController@printCashin'))}}
	      <input type="hidden" value="{{$month}}" name="month">
	      <input type="hidden" value="{{$year}}" name="year">
	      <button class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Page</button>
	    {{Form::close()}}
	    {{Form::open(array('action' => 'PrintController@saveCashin'))}}
	    	<input type="hidden" value="{{$month}}" name="month">
	    	<input type="hidden" value="{{$year}}" name="year">      
	    	<button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Page</button>
	    {{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		          <h3 class="sub-header">Cash In Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'KonsolidasiController@cashout')) }}
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
					<td></td>
					<td>Proyek Lama Dan Baru</td>
					<td colspan="16"></td>
				</tr>
				@foreach($cashin as $data)
				<tr>
					<td>{{ $data->proyek->spk }}</td>
					<td>{{ $data->proyek->nm_proyek }}</td>
					<td>{{ number_format($data->proyeksi) }}</td>
					<td>
						<?php 
						$sblum_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('YEAR(tgl_cash_in)'), '<', $year )			
					            ->sum('nilai_cash_in');
					    
					    	echo number_format($sblum_proyeksi);
					    ?>
					</td>
					<td>
						<?php 
						$sblum_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->sum('nilai_cash_in');
					    
					    	echo number_format($sblum_proyeksi);
					    ?>
					</td>
					<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_jan = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_jan);
					    ?>
					</td>
					<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_feb = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_feb);
					    ?>
					</td>
					<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_mar = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_mar);
					    ?>
					</td>
					<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_apr = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_apr);
					    ?>
					</td>
					<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_mei = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_mei);
					    ?>
					</td>
					<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_jun = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_jun);
					    ?>
					</td>
					<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_jul = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_jul);
					    ?>
					</td>
					<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_agt = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_agt);
					    ?>
					</td>
					<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_sep = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_sep);
					    ?>
					</td>
					<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_okt = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_okt);
					    ?>
					</td>
					<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?>>
						<?php 
						$cashin_nov = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_nov);
					    ?>
					</td>
					<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$cashin_des = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
					            ->pluck('nilai_cash_in');
					    
					    	echo number_format($cashin_des);
					    ?>
					</td>
					<td>
						<?php 
						$ssdah_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
								->where(DB::raw('YEAR(tgl_cash_in)'), '>', $year )			
					            ->sum('nilai_cash_in');
					    
					    	echo number_format($ssdah_proyeksi);
					    ?>
					</td>
					<td>
						<?php 
						$total_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
					            ->sum('nilai_cash_in');
					    
					    	echo number_format($total_proyeksi);
					    ?>
					</td>
				</tr>
				@endforeach
				@foreach($noCashin as $data)
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
					<td colspan="2"></td>
					<td>{{ number_format($proyeksi) }}</td>
					<td><?php 
						$sblum_total = Cashind::where(DB::raw('YEAR(tgl_cash_in)'), '<', $year )
					            ->sum('nilai_cash_in');
					    	echo number_format($sblum_total);
					    ?>
					</td>
					<td><?php 
						$total_th = Cashind::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )	
					            ->sum('nilai_cash_in');
					    	echo number_format($total_th);
					    ?>
					</td>
					<td>{{ number_format($jan) }}</td>
					<td>{{ number_format($feb) }}</td>
					<td>{{ number_format($mar) }}</td>
					<td>{{ number_format($apr) }}</td>
					<td>{{ number_format($mei) }}</td>
					<td>{{ number_format($jun) }}</td>
					<td>{{ number_format($jul) }}</td>
					<td>{{ number_format($agt) }}</td>
					<td>{{ number_format($sep) }}</td>
					<td>{{ number_format($okt) }}</td>
					<td>{{ number_format($nov) }}</td>
					<td>{{ number_format($des) }}</td>
					<td><?php 
						$ssdah_total = Cashind::where(DB::raw('YEAR(tgl_cash_in)'), '>', $year )			
					            ->sum('nilai_cash_in');
					    
					    	echo number_format($ssdah_total);
					    ?>
					</td>
					<td><?php 
						$total_cash = Cashind::sum('nilai_cash_in');
					    
					    	echo number_format($total_cash);
					    ?>
					</td>
				</tr>
				<tr></tr>
			</table>
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Selanjutnya') }}
          	{{Form::close() }}
	</div>
</div>
@stop