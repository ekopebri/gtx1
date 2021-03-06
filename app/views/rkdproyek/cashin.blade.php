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
		<h3 class="sub-header">Cash In Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
            {{ Form::open(array('action' => 'ProyekController@cashout')) }}
			<table class="table table-bordered">
				<tr style="font-weight:bold; text-align:center;">
					<td rowspan="2">SPK</td>
					<td rowspan="2">Nama Proyek</td>
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
					<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existJan = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 1 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existJan)) {
							?>						
                    		{{ $jan->nilai_cash_in }}
            			<?php } else { ?>
            			<span class="cashin_jan" data-type="text" data-pk="{{ $jan->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ number_format($jan->nilai_cash_in) }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existFeb = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 2 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existFeb)) {
							?>
                    		{{ number_format($feb->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_feb" data-type="text" data-pk="{{ $feb->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $feb->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existMar = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 3 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existMar)) {
							?>
                    		{{ number_format($mar->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_mar" data-type="text" data-pk="{{ $mar->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $mar->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existApr = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 4 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existApr)) {
							?>
                    		{{ number_format($apr->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_apr" data-type="text" data-pk="{{ $apr->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $apr->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existMei = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 5 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existMei)) {
							?>
                    		{{ number_format($mei->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_mei" data-type="text" data-pk="{{ $mei->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $mei->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existJun = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 6 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existJun)) {
							?>
                    		{{ number_format($jun->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_jun" data-type="text" data-pk="{{ $jun->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $jun->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existJul = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 7 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existJul)) {
							?>
                    		{{ number_format($jul->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_jul" data-type="text" data-pk="{{ $jul->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $jul->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existAgt = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 8 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existAgt)) {
							?>
                    		{{ number_format($agt->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_agt" data-type="text" data-pk="{{ $agt->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $agt->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existSep = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 9 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existSep)) {
							?>
                    		{{ number_format($sep->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_sep" data-type="text" data-pk="{{ $sep->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $sep->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existOkt = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 10 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existOkt)) {
							?>
                    		{{ number_format($okt->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_okt" data-type="text" data-pk="{{ $okt->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $okt->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existNov = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 11 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existNov)) {
							?>
                    		{{ number_format($nov->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_nov" data-type="text" data-pk="{{ $nov->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $nov->nilai_cash_in }}
            			</span>
            			<?php } ?>
            		</td>
					<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
						<?php 
						$existDes = Termin::where('proyek_id', $cashin->proyek->id)
										->where(DB::raw('MONTH(tgl_dwi1)'), '=', 12 ) 
										->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year) 	
										->pluck('id');
						if (is_numeric($existDes)) {
							?>
                    		{{ number_format($des->nilai_cash_in) }}
						<?php } else { ?>
						<span class="cashin_des" data-type="text" data-pk="{{ $des->id }}" data-url="{{ url('admin/proyek/cashind/update') }}" data-title="Enter Value" data-name='nilai_cash_in'>
                    		{{ $des->nilai_cash_in }}
            			</span>
            			<?php } ?>
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
					<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_jan">
						{{ number_format($jan->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_feb">
						{{ number_format($feb->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_mar">
						{{ number_format($mar->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_apr">
						{{ number_format($apr->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_mei">
						{{ number_format($mei->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_jun">
						{{ number_format($jun->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_jul">
						{{ number_format($jul->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_agt">
						{{ number_format($agt->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_sep">
						{{ number_format($sep->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_okt">
						{{ number_format($okt->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
						<span id="cashin_nov">
						{{ number_format($nov->nilai_cash_in) }}
						</span>
					</td>
					<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
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
				<tr>
					<td colspan="5">Akumulasi S/D Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?></td>
					
					<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 1) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_jan = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_jan);
						}?>
					</td>
					<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 2) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_feb = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_feb);
						}?>
					</td>
					<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 3) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_mar = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_mar);
						}?>
					</td>
					<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 4) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_apr = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_apr);
						}?>
					</td>
					<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 5) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_mei = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_mei);
						}?>
					</td>
					<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 6) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_jun = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_jun);
						}?>
					</td>
					<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 7) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_jul = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_jul);
						}?>
					</td>
					<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 8) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_agt = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_agt);
						}?>
					</td>
					<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 9) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_sep = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_sep);
						}?>
					</td>
					<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 10) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_okt = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_okt);
						}?>
					</td>
					<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 11) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_nov = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_nov);
						}?>
					</td>
					<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
						<?php if ($month == 12) {  
							$awal = new dateTime($year."-01-01");
	    					$akhir = new dateTime($year."-".$month."-28");
							
							$cashin_des = Cashind::where('proyek_id','=',$cashin->proyek->id)
									->whereBetween('tgl_cash_in', [$awal, $akhir]) 
						            ->sum('nilai_cash_in');
						    
					    	echo number_format($cashin_des);
						}?>
					</td>
            		<td>
            			
	            	</td>
            		<td>
            			
            		</td>
				</tr>
			</table>
            {{ Form::hidden('id', $cashin->proyek->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Selanjutnya') }}
          	{{Form::close() }}
	</div>
</div>
@stop