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
                <i class="fa fa-file"></i> Cash Out
            </li>
        </ol>
        {{Form::open(array('action' => 'PrintController@printCashout'))}}
	      <input type="hidden" value="{{$month}}" name="month">
	      <input type="hidden" value="{{$year}}" name="year">
	      <button class="btn btn-default pull-right"><i class="fa fa-print"></i> Print Page</button>
	    {{Form::close()}}
	    {{Form::open(array('action' => 'PrintController@saveCashout'))}}
	      <input type="hidden" value="{{$month}}" name="month">
	      <input type="hidden" value="{{$year}}" name="year">      
	      <button class="btn btn-default pull-right"><i class="fa fa-save"></i> Save Page</button>
	    {{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
          <h3 class="sub-header">Cash Out Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'KonsolidasiController@omzet')) }}
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
						<td>Proyek Lama dan baru</td>
						<td colspan="16"></td>
					</tr>
					@foreach($cashout as $data)
					<tr>
						<td>{{ $data->proyek->spk }}</td>
						<td>{{ $data->proyek->nm_proyek }}</td>
						<td colspan="17"></td>
					</tr>
					<tr>
						<td></td>
						<td>   Pengeluaran Cash di proyek/droping</td>
						<td>{{ number_format($data->cash_proyek) }}</td>
						<td>
							<?php 
							$sblum_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 1 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($sblum_droping);
						    ?>
						</td>
						<td>
							<?php 
							$total_p = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 1 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($total_p);
						    ?>
						</td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$janp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($janp);
						    ?>
						</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$febp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($febp);
						    ?>
						</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$marp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($marp);
						    ?>
						</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$aprp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($aprp);
						    ?>
						</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$meip = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($meip);
						    ?>
						</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$junp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($junp);
						    ?>
						</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$julp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($julp);
						    ?>
						</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$agtp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($agtp);
						    ?>
						</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$sepp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($sepp);
						    ?>
						</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$oktp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($oktp);
						    ?>
						</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$novp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($novp);
						    ?>
						</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$desp = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 1 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($desp)
						    ?>
						</td>
						<td>
							<?php 
							$ssdah_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 1 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )			
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($ssdah_droping);
						    ?>
						</td>
						<td>
							<?php 
							$total_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 1 ) 
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($total_droping);
						    ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>   Pembayaran Tunai Via Departemen</td>
						<td>{{ number_format($data->cash_departemen) }}</td>
						<td><?php 
							$sblum_depar = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 2 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($sblum_depar);
						    ?>
						</td>
						<td><?php 
							$total_d = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 2 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($total_d);
						    ?>
						</td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$jand = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($jand);
						    ?>
						</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$febd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($febd);
						    ?>
						</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$mard = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($mard);
						    ?>
						</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$aprd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($aprd);
						    ?>
						</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$meid = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($meid);
						    ?>
						</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$jund = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($jund);
						    ?>
						</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$juld = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($juld);
						    ?>
						</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$agtd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($agtd);
						    ?>
						</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$sepd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($sepd);
						    ?>
						</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$oktd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($oktd);
						    ?>
						</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$novd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($novd);
						    ?>
						</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$desd = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 2 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($desd);
						    ?>
						</td>
						<td><?php 
							$ssdah_depar = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 2 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )			
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($ssdah_depar);
						    ?>
						</td>
						<td><?php 
							$total_depar = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 2 ) 
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($total_depar);
						    ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>   Pembayaran Via Fasilitas</td>
						<td>{{ number_format($data->cash_fasilitas) }}</td>
						<td><?php 
							$sblum_fasilitas = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 3 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($sblum_fasilitas);
						    ?>
						</td>
						<td><?php 
							$total_f = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 3 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($total_f);
						    ?>
						</td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$janf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($janf);
						    ?>
						</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$febf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($febf);
						    ?>
						</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$marf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($marf);
						    ?>
						</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$aprf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($aprf);
						    ?>
						</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$meif = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($meif);
						    ?>
						</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$junf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($junf);
						    ?>
						</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$julf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($julf);
						    ?>
						</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$agtf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($agtf);
						    ?>
						</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$sepf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($sepf);
						    ?>
						</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$oktf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($oktf);
						    ?>
						</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$novf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($novf);
						    ?>
						</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php
							$desf = Cashoutd::where('proyek_id','=',$data->proyek->id)
									->where('cash_type', '=', 3 ) 
									->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
									->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
						            ->pluck('nilai_cash_out');
						    echo number_format($desf);
						    ?>
						</td>
						<td><?php 
							$ssdah_fasilitas = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 3 ) 
											->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )			
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($ssdah_fasilitas);
						    ?>
						</td>
						<td><?php 
							$total_fasilitas = Cashoutd::where('proyek_id','=',$data->proyek->id)
											->where('cash_type', '=', 3 ) 
						            		->sum('nilai_cash_out');
						    
						   	echo number_format($total_fasilitas);
						    ?>
						</td>
					</tr>
					@endforeach
					@foreach($noCashout as $data)
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
						<td colspan="2">Jumlah Uang Keluar Proyek</td>
						<td>{{ number_format($proyeksi_proyek) }}</td>
						<td><?php 
							$sbelum = Cashoutd::where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($sbelum);
						    ?>
						</td>
						<td><?php 
							$total_th = Cashoutd::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($total_th);
						    ?>
						</td>
						<td>{{ number_format($jan_proyek) }}</td>
						<td>{{ number_format($feb_proyek) }}</td>
						<td>{{ number_format($mar_proyek) }}</td>
						<td>{{ number_format($apr_proyek) }}</td>
						<td>{{ number_format($mei_proyek) }}</td>
						<td>{{ number_format($jun_proyek) }}</td>
						<td>{{ number_format($jul_proyek) }}</td>
						<td>{{ number_format($agt_proyek) }}</td>
						<td>{{ number_format($sep_proyek) }}</td>
						<td>{{ number_format($okt_proyek) }}</td>
						<td>{{ number_format($nov_proyek) }}</td>
						<td>{{ number_format($des_proyek) }}</td>
						<td><?php 
							$ssdah = Cashoutd::where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )
						            		->sum('nilai_cash_out');
						   	echo number_format($ssdah);
						    ?>
						</td>
						<td><?php 
							$total = Cashoutd::sum('nilai_cash_out');
						   	echo number_format($total);
						    ?>
						</td>
					</tr>
				</table>
				<table class="table table-bordered">
					<tr style="font-weight:bold; text-align:center;">
			            <td rowspan="2">SPK</td>
			            <td rowspan="2">Uraian</td>
			            <td rowspan="2">Proyeksi Tahun {{$year}}</td>
			            <td rowspan="2">Ri S/D Bulan <?php setlocale(LC_TIME, 'IND'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?></td>
			            <td colspan="12">Tahun {{$year}}</td>
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
						<td>B. DIVISI</td>
						<td colspan="14"></td>
					</tr>
					@foreach($cashoutdiv as $data)
					<tr>
						<td>{{ $data->div->spk }}</td>
						<td>{{ $data->div->nm_divisi }}</td>
						<td colspan="14"></td>
					</tr>
					<tr>
						<td></td>
						<td>BIAYA PEMASARAN</td>
			            <td>{{ number_format($data->pemasaran) }}</td>
						<td>
							<?php 
							$awal = new dateTime($year."-01-01");
$monthh = $month-1;
	    					$akhir = new dateTime($year."-".$monthh."-28");
						    //Realisasi pemasaran
						    $pemasaran = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 1 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					            echo number_format($pemasaran);
					        ?>
					    </td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jana = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jana);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$feba = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($feba);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$mara = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($mara);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$apra = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($apra);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meia = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meia);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$juna = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($juna);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jula = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jula);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agta = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agta);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepa = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepa);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$okta = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($okta);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$nova = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($nova);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desa = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 1 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desa);
            				?>
            			</td>
					</tr>
					<tr>
						<td></td>
						<td>BIAYA SEKRETARIAT</td>
			            <td>{{ number_format($data->sekretariat) }}</td>
						<td>
							<?php 
							$sekretariat = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 2 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					        echo number_format($sekretariat);
					        ?>
            			</td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$janb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($janb);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febb);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$marb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($marb);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$aprb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($aprb);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meib = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meib);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$junb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($junb);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$julb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($julb);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agtb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agtb);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepb);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$oktb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($oktb);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$novb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($novb);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desb = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 2 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desb);
            				?>
            			</td>
					</tr>
					<tr>
						<td></td>
						<td>BIAYA FASILITAS</td>
			            <td>{{ number_format($data->fasilitas) }}</td>
						<td>
							<?php
							$fasilitas = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 3 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					        echo number_format($fasilitas);
							?>
						</td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$janc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($janc);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febc);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$marc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($marc);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$aprc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($aprc);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meic = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meic);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$junc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($junc);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$julc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($julc);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agtc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agtc);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepc);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$oktc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($oktc);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$novc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($novc);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desc = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 3 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desc);
            				?>
            			</td>
					</tr>
			        <tr>
			        	<td></td>
			            <td>BIAYA PERSONALIA</td>
			            <td>{{ number_format($data->personalia) }}</td>
			            <td>
			            	<?php
			            	$personalia = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 4 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					        echo number_format($personalia);
			            	?>
			            </td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jand = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jand);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febd);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$mard = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($mard);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$aprd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($aprd);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meid = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meid);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jund = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jund);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$juld = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($juld);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agtd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agtd);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepd);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$oktd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($oktd);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$novd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($novd);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desd = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 4 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desd);
            				?>
            			</td>
					</tr>
			        <tr>
			            <td></td>
			            <td>BIAYA KEUANGAN</td>
			            <td>{{ number_format($data->keuangan) }}</td>
			            <td>
			            	<?php
			            	$keuangan = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 5 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
			            	echo number_format($keuangan);
			            	?>
			            </td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jane = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jane);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febe = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febe);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$mare = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($mare);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$apre = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($apre);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meie = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meie);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$june = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($june);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jule = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jule);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agte = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agte);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepe = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepe);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$okte = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($okte);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$nove = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($nove);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$dese = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 5 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($dese);
            				?>
            			</td>
					</tr>
			        <tr>
			            <td></td>
			            <td>BIAYA KENDARAAN</td>
			            <td>{{ number_format($data->kendaraan) }}</td>
			            <td>
			            	<?php
			            	$kendaraan = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 6 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					        echo number_format($kendaraan);
			            	?>
			            </td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$janf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($janf);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febf);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$marf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($marf);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$aprf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($aprf);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meif = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meif);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$junf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($junf);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$julf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($julf);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agtf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agtf);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepf);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$oktf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($oktf);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$novf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($novf);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desf = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 6 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desf);
            				?>
            			</td>
					</tr>
			        <tr>
			            <td></td>
			            <td>BIAYA UMUM</td>
			            <td>{{ number_format($data->umum) }}</td>
			            <td>
			            	<?php
			            	$umum = Cashoutddiv::where('divisi_id','=',$data->div->id)
								->where('cashout_id', '=', 7 )
								->whereBetween('tgl_cashout', [$awal, $akhir]) 
					            ->sum('nilai_cashout');
					        echo number_format($umum);
			            	?>
			            </td>
			            <td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jang = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jang);
            				?>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$febg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($febg);
            				?>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$marg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($marg);
            				?>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$aprg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($aprg);
            				?>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$meig = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($meig);
            				?>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$jung = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($jung);
            				?>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$julg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($julg);
            				?>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$agtg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($agtg);
            				?>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$sepg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($sepg);
            				?>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$oktg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($oktg);
            				?>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$novg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($novg);
            				?>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php 
							$desg = Cashoutddiv::where('divisi_id','=', $data->div->id)
								->where('cashout_id', '=', 7 ) 
								->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
								->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
					            ->pluck('nilai_cashout');
					        echo number_format($desg);
            				?>
            			</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="2">Jumlah Uang Keluar Divisi</td>
						<td>{{ number_format($ok_netto_divisi) }}</td>
						<td>{{ number_format($proyeksi_divisi) }}</td>
						<td>{{ number_format($jan_divisi) }}</td>
						<td>{{ number_format($feb_divisi) }}</td>
						<td>{{ number_format($mar_divisi) }}</td>
						<td>{{ number_format($apr_divisi) }}</td>
						<td>{{ number_format($mei_divisi) }}</td>
						<td>{{ number_format($jun_divisi) }}</td>
						<td>{{ number_format($jul_divisi) }}</td>
						<td>{{ number_format($agt_divisi) }}</td>
						<td>{{ number_format($sep_divisi) }}</td>
						<td>{{ number_format($okt_divisi) }}</td>
						<td>{{ number_format($nov_divisi) }}</td>
						<td>{{ number_format($des_divisi) }}</td>
					</tr>
				</table>
	            {{ Form::hidden('year', $year)}}
	            {{ Form::hidden('month', $month)}}
	            {{ Form::submit('Selanjutnya') }}
			{{Form::close() }}	</div>
</div>
@stop