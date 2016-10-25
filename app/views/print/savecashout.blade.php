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
   Cash Out Bulan <?php $monthNum = $month; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo $monthName; //output: May?> {{$year}} (Dalam jutaan)
  </caption>
   <thead>
    <tr class="thead">
	    <td rowspan="2" style="width: 5%;">SPK</td>
	    <td rowspan="2">Uraian</td>
	    <td rowspan="2" style="width: 7%;">RKP</td>
	    <td rowspan="2" style="width: 7%;">Ri Tahun {{$year-1}}</td>
	    <td rowspan="2" style="width: 7%;">Jumlah Tahun {{$year}}</td>
	    <td colspan="12">Tahun {{$year}}</td>
	    <td rowspan="2" style="width: 7%;">Ra Tahun {{$year+1}}</td>
	    <td rowspan="2" style="width: 7%;">Total S/D Selesai</td>
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
		<td>Proyek Lama dan baru</td>
		<td colspan="16"></td>
	</tr>
    </thead>
    <tbody>
    @foreach($cashout as $data)
	<tr>
		<td>{{ $data->proyek->spk }}</td>
		<td align="left">{{ $data->proyek->nm_proyek }}</td>
		<td colspan="16"></td>
	</tr>
	<tr>
		<td></td>
		<td align="left">   Pengeluaran Cash di proyek/droping</td>
		<td>{{ number_format($data->cash_proyek) }}</td>
		<td><?php 
			$sblum_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
							->where('cash_type', '=', 1 ) 
							->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )			
		            		->sum('nilai_cash_out');
		    
		   	echo number_format($sblum_droping);
		    ?>
		</td>
		<td><?php 
			$total_p = Cashoutd::where('proyek_id','=',$data->proyek->id)
							->where('cash_type', '=', 1 ) 
							->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )		
		            		->sum('nilai_cash_out');
		   	echo number_format($total_p);
		    ?>
		</td>
		<td>
			<?php
			$janp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($janp);
		    ?>
		</td>
		<td>
			<?php
			$febp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($febp);
		    ?>
		</td>
		<td>
			<?php
			$marp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($marp);
		    ?>
		</td>
		<td>
			<?php
			$aprp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($aprp);
		    ?>
		</td>
		<td>
			<?php
			$meip = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($meip);
		    ?>
		</td>
		<td>
			<?php
			$junp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($junp);
		    ?>
		</td>
		<td>
			<?php
			$julp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($julp);
		    ?>
		</td>
		<td>
			<?php
			$agtp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($agtp);
		    ?>
		</td>
		<td>
			<?php
			$sepp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($sepp);
		    ?>
		</td>
		<td>
			<?php
			$oktp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($oktp);
		    ?>
		</td>
		<td>
			<?php
			$novp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($novp);
		    ?>
		</td>
		<td>
			<?php
			$desp = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($desp)
		    ?>
		</td>
		<td><?php 
			$ssdah_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
							->where('cash_type', '=', 1 ) 
							->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )			
		            		->sum('nilai_cash_out');
		    
		   	echo number_format($ssdah_droping);
		    ?>
		</td>
		<td><?php 
			$total_droping = Cashoutd::where('proyek_id','=',$data->proyek->id)
							->where('cash_type', '=', 1 ) 
		            		->sum('nilai_cash_out');
		    
		   	echo number_format($total_droping);
		    ?>
		</td>
	</tr>
	<tr>
		<td></td>
		<td align="left">   Pembayaran Tunai Via Departemen</td>
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
		<td>
			<?php
			$jand = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($jand);
		    ?>
		</td>
		<td>
			<?php
			$febd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($febd);
		    ?>
		</td>
		<td>
			<?php
			$mard = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($mard);
		    ?>
		</td>
		<td>
			<?php
			$aprd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($aprd);
		    ?>
		</td>
		<td>
			<?php
			$meid = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($meid);
		    ?>
		</td>
		<td>
			<?php
			$jund = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($jund);
		    ?>
		</td>
		<td>
			<?php
			$juld = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($juld);
		    ?>
		</td>
		<td>
			<?php
			$agtd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($agtd);
		    ?>
		</td>
		<td>
			<?php
			$sepd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($sepd);
		    ?>
		</td>
		<td>
			<?php
			$oktd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($oktd);
		    ?>
		</td>
		<td>
			<?php
			$novd = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($novd);
		    ?>
		</td>
		<td>
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
		<td align="left">   Pembayaran Via Fasilitas</td>
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
		<td>
			<?php
			$janf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($janf);
		    ?>
		</td>
		<td>
			<?php
			$febf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($febf);
		    ?>
		</td>
		<td>
			<?php
			$marf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($marf);
		    ?>
		</td>
		<td>
			<?php
			$aprf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($aprf);
		    ?>
		</td>
		<td>
			<?php
			$meif = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($meif);
		    ?>
		</td>
		<td>
			<?php
			$junf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($junf);
		    ?>
		</td>
		<td>
			<?php
			$julf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($julf);
		    ?>
		</td>
		<td>
			<?php
			$agtf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($agtf);
		    ?>
		</td>
		<td>
			<?php
			$sepf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($sepf);
		    ?>
		</td>
		<td>
			<?php
			$oktf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($oktf);
		    ?>
		</td>
		<td>
			<?php
			$novf = Cashoutd::where('proyek_id','=',$data->proyek->id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
		            ->pluck('nilai_cash_out');
		    echo number_format($novf);
		    ?>
		</td>
		<td>
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
		<td align="left"><font color="red">{{ $data->nm_proyek }}</font></td>
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
    </tbody>
  </table>
  <br>
  <table cellpadding="5" cellspacing="0" border="1">
   <thead>
   	<tr>
        <td rowspan="2" style="width: 5%;">SPK</td>
        <td rowspan="2">Uraian</td>
        <td rowspan="2">Proyeksi Tahun {{$year}}</td>
        <td rowspan="2">Ri S/D Bulan <?php setlocale(LC_TIME, 'IND'); $monthName = strftime("%B", mktime(0, 0, 0, $month, 1)); echo $monthName; ?></td>
        <td colspan="12">Tahun {{$year}}</td>
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
		<td align="left">DIVISI</td>
		<td colspan="14"></td>
	</tr>
    </thead>
    <tbody>
    @foreach($cashoutdiv as $data)
		<tr>
			<td>{{ $data->div->spk }}</td>
			<td align="left">{{ $data->div->nm_divisi }}</td>
			<td colspan="14"></td>
		</tr>
		<tr>
			<td></td>
			<td align="left">BIAYA PEMASARAN</td>
            <td>{{ number_format($data->pemasaran) }}</td>
			<td>
				<?php 
				$awal = new dateTime($year."-01-01");
				$akhir = new dateTime($year."-".$month."-28");
			    //Realisasi pemasaran
			    $pemasaran = Cashoutddiv::where('divisi_id','=',$data->div->id)
					->where('cashout_id', '=', 1 )
					->whereBetween('tgl_cashout', [$awal, $akhir]) 
		            ->sum('nilai_cashout');
		            echo number_format($pemasaran);
		        ?>
		    </td>
			<td>
				<?php 
				$jana = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jana);
				?>
			</td>
			<td>
				<?php 
				$feba = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($feba);
				?>
			</td>
			<td>
				<?php 
				$mara = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($mara);
				?>
			</td>
			<td>
				<?php 
				$apra = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($apra);
				?>
			</td>
			<td>
				<?php 
				$meia = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meia);
				?>
			</td>
			<td>
				<?php 
				$juna = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($juna);
				?>
			</td>
			<td>
				<?php 
				$jula = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jula);
				?>
			</td>
			<td>
				<?php 
				$agta = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agta);
				?>
			</td>
			<td>
				<?php 
				$sepa = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepa);
				?>
			</td>
			<td>
				<?php 
				$okta = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($okta);
				?>
			</td>
			<td>
				<?php 
				$nova = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($nova);
				?>
			</td>
			<td>
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
			<td align="left">BIAYA SEKRETARIAT</td>
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
            <td>
				<?php 
				$janb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($janb);
				?>
			</td>
			<td>
				<?php 
				$febb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febb);
				?>
			</td>
			<td>
				<?php 
				$marb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($marb);
				?>
			</td>
			<td>
				<?php 
				$aprb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($aprb);
				?>
			</td>
			<td>
				<?php 
				$meib = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meib);
				?>
			</td>
			<td>
				<?php 
				$junb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($junb);
				?>
			</td>
			<td>
				<?php 
				$julb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($julb);
				?>
			</td>
			<td>
				<?php 
				$agtb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agtb);
				?>
			</td>
			<td>
				<?php 
				$sepb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepb);
				?>
			</td>
			<td>
				<?php 
				$oktb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($oktb);
				?>
			</td>
			<td>
				<?php 
				$novb = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($novb);
				?>
			</td>
			<td>
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
			<td align="left">BIAYA FASILITAS</td>
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
            <td>
				<?php 
				$janc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($janc);
				?>
			</td>
			<td>
				<?php 
				$febc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febc);
				?>
			</td>
			<td>
				<?php 
				$marc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($marc);
				?>
			</td>
			<td>
				<?php 
				$aprc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($aprc);
				?>
			</td>
			<td>
				<?php 
				$meic = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meic);
				?>
			</td>
			<td>
				<?php 
				$junc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($junc);
				?>
			</td>
			<td>
				<?php 
				$julc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($julc);
				?>
			</td>
			<td>
				<?php 
				$agtc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agtc);
				?>
			</td>
			<td>
				<?php 
				$sepc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepc);
				?>
			</td>
			<td>
				<?php 
				$oktc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($oktc);
				?>
			</td>
			<td>
				<?php 
				$novc = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($novc);
				?>
			</td>
			<td>
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
            <td align="left">BIAYA PERSONALIA</td>
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
            <td>
				<?php 
				$jand = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jand);
				?>
			</td>
			<td>
				<?php 
				$febd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febd);
				?>
			</td>
			<td>
				<?php 
				$mard = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($mard);
				?>
			</td>
			<td>
				<?php 
				$aprd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($aprd);
				?>
			</td>
			<td>
				<?php 
				$meid = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meid);
				?>
			</td>
			<td>
				<?php 
				$jund = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jund);
				?>
			</td>
			<td>
				<?php 
				$juld = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($juld);
				?>
			</td>
			<td>
				<?php 
				$agtd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agtd);
				?>
			</td>
			<td>
				<?php 
				$sepd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepd);
				?>
			</td>
			<td>
				<?php 
				$oktd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($oktd);
				?>
			</td>
			<td>
				<?php 
				$novd = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($novd);
				?>
			</td>
			<td>
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
            <td align="left">BIAYA KEUANGAN</td>
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
            <td>
				<?php 
				$jane = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jane);
				?>
			</td>
			<td>
				<?php 
				$febe = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febe);
				?>
			</td>
			<td>
				<?php 
				$mare = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($mare);
				?>
			</td>
			<td>
				<?php 
				$apre = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($apre);
				?>
			</td>
			<td>
				<?php 
				$meie = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meie);
				?>
			</td>
			<td>
				<?php 
				$june = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($june);
				?>
			</td>
			<td>
				<?php 
				$jule = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jule);
				?>
			</td>
			<td>
				<?php 
				$agte = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agte);
				?>
			</td>
			<td>
				<?php 
				$sepe = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepe);
				?>
			</td>
			<td>
				<?php 
				$okte = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($okte);
				?>
			</td>
			<td>
				<?php 
				$nove = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($nove);
				?>
			</td>
			<td>
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
            <td align="left">BIAYA KENDARAAN</td>
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
            <td>
				<?php 
				$janf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($janf);
				?>
			</td>
			<td>
				<?php 
				$febf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febf);
				?>
			</td>
			<td>
				<?php 
				$marf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($marf);
				?>
			</td>
			<td>
				<?php 
				$aprf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($aprf);
				?>
			</td>
			<td>
				<?php 
				$meif = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meif);
				?>
			</td>
			<td>
				<?php 
				$junf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($junf);
				?>
			</td>
			<td>
				<?php 
				$julf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($julf);
				?>
			</td>
			<td>
				<?php 
				$agtf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agtf);
				?>
			</td>
			<td>
				<?php 
				$sepf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepf);
				?>
			</td>
			<td>
				<?php 
				$oktf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($oktf);
				?>
			</td>
			<td>
				<?php 
				$novf = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($novf);
				?>
			</td>
			<td>
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
            <td align="left">BIAYA UMUM</td>
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
            <td>
				<?php 
				$jang = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jang);
				?>
			</td>
			<td>
				<?php 
				$febg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($febg);
				?>
			</td>
			<td>
				<?php 
				$marg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($marg);
				?>
			</td>
			<td>
				<?php 
				$aprg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($aprg);
				?>
			</td>
			<td>
				<?php 
				$meig = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($meig);
				?>
			</td>
			<td>
				<?php 
				$jung = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($jung);
				?>
			</td>
			<td>
				<?php 
				$julg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($julg);
				?>
			</td>
			<td>
				<?php 
				$agtg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($agtg);
				?>
			</td>
			<td>
				<?php 
				$sepg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($sepg);
				?>
			</td>
			<td>
				<?php 
				$oktg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($oktg);
				?>
			</td>
			<td>
				<?php 
				$novg = Cashoutddiv::where('divisi_id','=', $data->div->id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('nilai_cashout');
		        echo number_format($novg);
				?>
			</td>
			<td>
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
    </tbody>
  </table>
</body>
</html>