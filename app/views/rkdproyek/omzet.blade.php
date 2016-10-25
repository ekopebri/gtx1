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
                <i class="fa fa-file"></i> Omzet
            </li>
        </ol>
        <button class="btn pull-right" onclick='window.location.reload(true);'>
      		<i class="fa fa-refresh"></i> Reload Page
    	</button>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h3 class="sub-header">Omset Penjualan Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; //output: May?> {{$year}} (Dalam jutaan)</h3>
          <div class="table-responsive">
				<table class="table table-bordered">
					<tr style="font-weight:bold; text-align:center;">
						<td rowspan="2">SPK</td>
						<td rowspan="2">Proyek</td>
						<td rowspan="2">SBU</td>
						<td rowspan="2">Sumber Dana</td>
						<td rowspan="2">Cara Perolehan</td>
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
						<td colspan="21">Proyek Lama dan Baru</td>
					</tr>
					<tr>
						<td>{{ $omzet->proyek->spk }}</td>
						<td>{{ $omzet->proyek->nm_proyek }}</td>
						<td>
							<span class="omzet" data-type="text" data-pk="{{ $omzet->id }}" data-url="{{ url('admin/proyek/omzet/update') }}" data-title="Enter Value" data-name='sbu'>
                    			{{ $omzet->sbu }}
            				</span>
            			</td>
						<td>
							<span class="omzet" data-type="text" data-pk="{{ $omzet->id }}" data-url="{{ url('admin/proyek/omzet/update') }}" data-title="Enter Value" data-name='sumber_dana'>
                    			{{ $omzet->sumber_dana }}
            				</span>
            			</td>
						<td>
							<span class="omzet" data-type="text" data-pk="{{ $omzet->id }}" data-url="{{ url('admin/proyek/omzet/update') }}" data-title="Enter Value" data-name='perolehan_dana'>
                    			{{ $omzet->perolehan_dana }}
            				</span>
            			</td>
						<td>
							<span class="omzet_proyeksi" data-type="text" data-pk="{{ $omzet->id }}" data-url="{{ url('admin/proyek/omzet/update') }}" data-title="Enter Value" data-name='proyeksi'>
								{{ number_format($omzet->proyeksi) }}
							</span>
						</td>
						<td>
							<span class="omzet_sbelum">
								{{ number_format($proyeksi_sbelum) }}
							</span>
						</td>
						<td>
							<span class="omzet_th">
								{{ number_format($jumlah_th) }}
							</span>
						</td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_jan" data-type="text" data-pk="{{ $jan->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$jan->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_feb" data-type="text" data-pk="{{ $feb->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$feb->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_mar" data-type="text" data-pk="{{ $mar->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$mar->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?>>
							<span class="omzet_apr" data-type="text" data-pk="{{ $apr->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$apr->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_mei" data-type="text" data-pk="{{ $mei->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$mei->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_jun" data-type="text" data-pk="{{ $jun->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$jun->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_jul" data-type="text" data-pk="{{ $jul->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$jul->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_agt" data-type="text" data-pk="{{ $agt->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$agt->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_sep" data-type="text" data-pk="{{ $sep->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$sep->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_okt" data-type="text" data-pk="{{ $okt->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$okt->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_nov" data-type="text" data-pk="{{ $nov->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$nov->nilai_omzet}}
            				</span>
            			</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<span class="omzet_des" data-type="text" data-pk="{{ $des->id }}" data-url="{{ url('admin/proyek/omzetd/update') }}" data-title="Enter Value" data-name='nilai_omzet'>
                    			{{$des->nilai_omzet}}
            				</span>
            			</td>
						<td>
							<span class="omzet_ssdah">
								{{ number_format($proyeksi_ssdah) }}
							</span>
						</td>
						<td>
							<span class="omzet_total">
								{{ number_format($total_proyeksi) }}
							</span>
						</td>
					</tr>
					<tr>
						<td colspan="2">JUMLAH PROYEK</td>
						<td colspan="3"></td>
						<td>
							<span id="omzet_proyeksi">
								{{ number_format($omzet->proyeksi) }}
							</span>
						</td>
						<td>
							<span id="omzet_sbelum">
								{{ number_format($proyeksi_sbelum) }}
							</span>
						</td>
						<td>
							<span id="omzet_th">
								{{ number_format($jumlah_th) }}
							</span>
						</td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_jan">
								{{ number_format($jan->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_feb">
								{{ number_format($feb->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_mar">
								{{ number_format($mar->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_apr">
								{{ number_format($apr->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_mei">
								{{ number_format($mei->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_jun">
								{{ number_format($jun->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_jul">
								{{ number_format($jul->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_agt">
								{{ number_format($agt->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_sep">
								{{ number_format($sep->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_okt">
								{{ number_format($okt->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_nov">
								{{ number_format($nov->nilai_omzet) }}
							</span>
						</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<span id="omzet_des">
								{{ number_format($des->nilai_omzet) }}
							</span>
						</td>
						<td>
							<span id="omzet_ssdah">
								{{ number_format($proyeksi_ssdah) }}
							</span>
						</td>
						<td>
							<span id="omzet_total">
								{{ number_format($total_proyeksi) }}
							</span>
						</td>
					</tr>
					<tr>
						<td colspan="2">Akumulasi S/D Bulan <?php setlocale(LC_TIME, 'id_ID'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?></td>
						<td colspan="6"></td>
						<td <?php if ($month == 1) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 1) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_jan = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_jan);
				              }?>
						</td>
						<td <?php if ($month == 2) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 2) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_feb = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_feb);
				              }?>
						</td>
						<td <?php if ($month == 3) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 3) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
				              $omzet_mar = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_mar);
				              }?>
						</td>
						<td <?php if ($month == 4) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 4) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_apr = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_apr);
				              }?>
						</td>
						<td <?php if ($month == 5) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 5) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_mei = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_mei);
				              }?>
						</td>
						<td <?php if ($month == 6) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 6) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_jun = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_jun);
				              }?>
						</td>
						<td <?php if ($month == 7) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 7) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
              				$omzet_jul = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_jul);
				              }?>
						</td>
						<td <?php if ($month == 8) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 8) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
				              $omzet_agt = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_agt);
				              }?>
						</td>
						<td <?php if ($month == 9) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 9) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
				              $omzet_sep = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_sep);
				              }?>
						</td>
						<td <?php if ($month == 10) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 10) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
				              
				              $omzet_okt = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_okt);
				              }?>
						</td>
						<td <?php if ($month == 11) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 11) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
				              $omzet_nov = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_nov);
				              }?>
						</td>
						<td <?php if ($month == 12) { echo "bgcolor='yellow'"; } ?> >
							<?php if ($month == 12) {  
				              $awal = new dateTime($year."-01-01");
				              $akhir = new dateTime($year."-".$month."-28");
              
				              $omzet_des = Omzetd::where('proyek_id','=',$omzet->proyek->id)
				                        ->whereBetween('tgl_omzet', [$awal, $akhir]) 
				                        ->sum('nilai_omzet');
				                
				                echo number_format($omzet_des);
				              }?>
						</td>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
		<!-- errors -->
        <p style="color: #c0392b">{{ $errors->first() }}</p>
        <hr>
        {{ Form::open(array('action' => 'ProyekController@selesai', 'files' => true)) }}
            {{ Form::file('document[]', ['multiple'=>true]) }}
            {{ Form::submit('Upload') }}          
			{{ Form::hidden('proyek_id', $omzet->proyek->id)}}
            {{ Form::hidden('year', $year)}}
            {{ Form::hidden('month', $month)}}
            {{ Form::submit('Submit') }}
      	{{Form::close() }}
	</div>
</div>
@stop