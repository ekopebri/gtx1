<html>
<head>
  <style type="text/css">
    table{
      text-align: center;
      vertical-align: middle;
      border: 1px solid black;
      font-size: 10;
      max-width: 842px;
    }

    body {
      padding: 1em;
    }
    table>thead>tr {
      font-weight: bold;
    }

    table>caption {
      font-size: 16px;
    }
  </style>
</head>
<body>
<table cellpadding="5" cellspacing="0" border="1">
  <caption>
   Cash In Bulan <?php $monthNum = $month; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; //output: May?> {{$year}} (Dalam jutaan)
  </caption>
   <thead>
    <tr>
		<td rowspan="2">SPK</td>
		<td rowspan="2">Uraian</td>
		<td rowspan="2">RKP</td>
		<td rowspan="2">Ri Tahun {{$year-1}}</td>
		<td rowspan="2">Jumlah Tahun {{$year}}</td>
		<td colspan="12">Tahun $year</td>
		<td rowspan="2">Ra Tahun {{$year+1}}</td>
		<td rowspan="2">Total S/D Selesai</td>
	</tr>
	<tr>
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
		<td>Proyek Lama Dan Baru</td>
		<td colspan="16"></td>
	</tr>
    </thead>
    <tbody>
      @foreach($cashin as $data)
		<tr>
			<td>{{ $data->proyek->spk }}</td>
			<td>{{ $data->proyek->nm_proyek }}</td>
			<td>{{ number_format($data->proyeksi) }}</td>
			<td><?php 
				$sblum_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('YEAR(tgl_cash_in)'), '<', $year )			
			            ->sum('nilai_cash_in');
			    
			    	echo number_format($sblum_proyeksi);
			    ?>
			</td>
			<td><?php 
				$total_th = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->sum('nilai_cash_in');
			    	echo number_format($total_th);
			    ?>
			</td>
			<td><?php 
				$jan = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($jan);
			    ?>
			</td>
			<td>
				<?php 
				$feb = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($feb);
			    ?>
			</td>
			<td>
				<?php 
				$mar = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($mar);
			    ?>
			</td>
			<td>
				<?php 
				$apr = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($apr);
			    ?>
			</td>
			<td>
				<?php 
				$mei = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($mei);
			    ?>
			</td>
			<td>
				<?php 
				$jun = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($jun);
			    ?>
			</td>
			<td>
				<?php 
				$jul = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($jul);
			    ?>
			</td>
			<td>
				<?php 
				$agt = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($agt);
			    ?>
			</td>
			<td>
				<?php 
				$sep = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($sep);
			    ?>
			</td>
			<td>
				<?php 
				$okt = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($okt);
			    ?>
			</td>
			<td>
				<?php 
				$nov = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($nov);
			    ?>
			</td>
			<td>
				<?php 
				$des = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('nilai_cash_in');
			    
			    	echo number_format($des);
			    ?>
			</td>
			<td><?php 
				$ssdah_proyeksi = Cashind::where('proyek_id','=',$data->proyek->id)
						->where(DB::raw('YEAR(tgl_cash_in)'), '>', $year )			
			            ->sum('nilai_cash_in');
			    
			    	echo number_format($ssdah_proyeksi);
			    ?>
			</td>
			<td><?php 
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
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
				$total_thcashin = Cashind::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->sum('nilai_cash_in');
			    	echo number_format($total_thcashin);
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
    </tbody>
  </table>
</body>
</html>