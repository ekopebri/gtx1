<?php


class AnggaranController extends \BaseController {

	
	public function pilihAction()
	{
		$title = "Anggaran proyek - Cash In";
		$input = Input::all();
		if (Input::get('pilihan') == 'Cash In') {
			$id = Input::get('spk');
			$year = Input::get('year');

	    	$jan = Cashind::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->pluck('id');
		    if (is_numeric($jan)) {
		    	$jan = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
			            ->pluck('id');
			   	$jan = Cashind::find($jan);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-01-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$jan = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
			            ->pluck('id');
			   		$jan = Cashind::find($jan);
		    	}
		    }

		    //FEBRUARI
		    $feb = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($feb)) {
		    	$feb = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$feb = Cashind::find($feb);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-02-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$feb = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			   		$feb = Cashind::find($feb);
		    	}
		    }

		    //MARET
		    $mar = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($mar)) {
		    	$mar = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$mar = Cashind::find($mar);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-03-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$mar = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			   		$mar = Cashind::find($mar);
		    	}
		    }

		    //APRIL
		    $apr = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($apr)) {
		    	$apr = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$apr = Cashind::find($apr);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-04-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$apr = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			   		$apr = Cashind::find($apr);
		    	}
		    }

		    //MEI
		    $mei = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($mei)) {
		    	$mei = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$mei = Cashind::find($mei);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-05-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$mei = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			   		$mei = Cashind::find($mei);
		    	}
		    }

		    //JUNI
		    $jun = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($jun)) {
		    	$jun = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$jun = Cashind::find($jun);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-06-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$jun = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			   		$jun = Cashind::find($jun);
		    	}
		    }

		    //JULI
		    $jul = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($jul)) {
		    	$jul = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			   	$jul = Cashind::find($jul);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-07-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$jul = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			    	$jul = Cashind::find($jul);
		    	}
		    }

		    //AGUSTUS
		    $agt = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($agt)) {
		    	$agt = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			    $agt = Cashind::find($agt);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-08-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$agt = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			        $agt = Cashind::find($agt);
		    	}
		    }

		    //SEPTEMBER
		    $sep = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($sep)) {
		    	$sep = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			    $sep = Cashind::find($sep);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-09-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$sep = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			        $sep = Cashind::find($sep);
		    	}
		    }

		    //OKTOBER
		    $okt = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($okt)) {
		    	$okt = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			    $okt = Cashind::find($okt);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-10-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$okt = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			        $okt = Cashind::find($okt);
		    	}
		    }

		    //NOVEMBER
		    $nov = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($nov)) {
		    	$nov = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			    $nov = Cashind::find($nov);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-11-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$nov = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			        $nov = Cashind::find($nov);
		    	}
		    }

		    //DESEMBER
		    $des = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
		            ->pluck('id');
		    if (is_numeric($des)) {
		    	$des = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
			            ->pluck('id');
			    $des = Cashind::find($des);
		    } else {
		    	$item = new Cashind;
		    	$item->proyek_id = $id;
		    	$item->tgl_cash_in = $year."-12-01";
		    	$item->nilai_cash_in = 0;
		    	$item->save();
		    	if($item) {
		    		$des = Cashind::where('proyek_id','=',$id)
						->where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
			            ->pluck('id');
			        $des = Cashind::find($des);
		    	}
		    }

		    //Cash IN
			$cashin = Cashin::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
		            ->pluck('id');
		    if (is_numeric($cashin)) {
		    	$cashin = Cashin::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
		            ->pluck('id');
			   $cashin = Cashin::find($cashin);
		    } else {
		    	$item = new Cashin;
		    	$item->proyek_id = $id;
		    	$item->proyeksi = 0;
		    	$item->tgl_cash_in = $year."-06-01";
		    	$item->save();
		    	if($item) {
		    		$cashin = Cashin::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
		            ->pluck('id');
			   		$cashin = Cashin::find($cashin);
		    	}
		    }
	    $proyeksi_sbelum = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '<', $year )					
		            ->sum('nilai_cash_in');
	    $proyeksi_ssdah = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '>', $year )					
		            ->sum('nilai_cash_in');
		$total_proyeksi = Cashind::where('proyek_id','=',$id)
		            ->sum('nilai_cash_in');
		$jumlah_th = Cashind::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )					
		            ->sum('nilai_cash_in');
		return View::make('anggaran/cashin', compact('month' , 'year', 'cashin', 'proyeksi_sbelum', 'proyeksi_ssdah', 'jumlah_th',
			'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des', 'title', 'total_proyeksi'));
		} elseif (Input::get('pilihan') == 'Cash Out') {
		$id = Input::get('spk');
		$year = Input::get('year');

		//JANUARI CASH PROYEK & DEPARTEMEN & FASILITAS
		//PROYEK
		$janp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($janp)) {
	    	$janp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$janp = Cashoutd::find($janp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-01-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$janp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$janp = Cashoutd::find($janp);
	    	}
	    }

	    //DEPARTEMEN
		$jand = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jand)) {
	    	$jand = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$jand = Cashoutd::find($jand);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-01-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$jand = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$jand = Cashoutd::find($jand);
	    	}
	    }

	    //FASILITAS
		$janf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($janf)) {
	    	$janf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$janf = Cashoutd::find($janf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-01-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$janf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$janf = Cashoutd::find($janf);
	    	}
	    }

	    //FEBRUARI
	    //PROYEK
		$febp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febp)) {
	    	$febp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$febp = Cashoutd::find($febp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-02-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$febp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$febp = Cashoutd::find($febp);
	    	}
	    }

	    //DEPARTEMEN
		$febd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febd)) {
	    	$febd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$febd = Cashoutd::find($febd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-02-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$febd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$febd = Cashoutd::find($febd);
	    	}
	    }

	    //FASILITAS
		$febf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febf)) {
	    	$febf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$febf = Cashoutd::find($febf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-02-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$febf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$febf = Cashoutd::find($febf);
	    	}
	    }

	    //MARET
	    //PROYEK
		$marp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marp)) {
	    	$marp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$marp = Cashoutd::find($marp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-03-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$marp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$marp = Cashoutd::find($marp);
	    	}
	    }

	    //DEPARTEMEN
		$mard = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($mard)) {
	    	$mard = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$mard = Cashoutd::find($mard);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-03-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$mard = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$mard = Cashoutd::find($mard);
	    	}
	    }

	    //FASILITAS
		$marf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marf)) {
	    	$marf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$marf = Cashoutd::find($marf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-03-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$marf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$marf = Cashoutd::find($marf);
	    	}
	    }

	    //APRIL
	    //PROYEK
		$aprp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprp)) {
	    	$aprp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$aprp = Cashoutd::find($aprp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-04-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$aprp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$aprp = Cashoutd::find($aprp);
	    	}
	    }

	    //DEPARTEMEN
		$aprd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprd)) {
	    	$aprd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$aprd = Cashoutd::find($aprd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-04-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$aprd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$aprd = Cashoutd::find($aprd);
	    	}
	    }

	    //FASILITAS
		$aprf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprf)) {
	    	$aprf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$aprf = Cashoutd::find($aprf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-04-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$aprf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$aprf = Cashoutd::find($aprf);
	    	}
	    }

	    //MEI
	    //PROYEK
		$meip = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meip)) {
	    	$meip = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$meip = Cashoutd::find($meip);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-05-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$meip = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$meip = Cashoutd::find($meip);
	    	}
	    }

	    //DEPARTEMEN
		$meid = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meid)) {
	    	$meid = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$meid = Cashoutd::find($meid);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-05-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$meid = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$meid = Cashoutd::find($meid);
	    	}
	    }

	    //FASILITAS
		$meif = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meif)) {
	    	$meif = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$meif = Cashoutd::find($meif);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-05-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$meif = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$meif = Cashoutd::find($meif);
	    	}
	    }

	    //JUNI
	    //PROYEK
		$junp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($junp)) {
	    	$junp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$junp = Cashoutd::find($junp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-06-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$junp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$junp = Cashoutd::find($junp);
	    	}
	    }

	    //DEPARTEMEN
		$jund = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jund)) {
	    	$jund = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$jund = Cashoutd::find($jund);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-06-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$jund = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$jund = Cashoutd::find($jund);
	    	}
	    }

	    //FASILITAS
		$junf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($junf)) {
	    	$junf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$junf = Cashoutd::find($junf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-06-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$junf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$junf = Cashoutd::find($junf);
	    	}
	    }

	    //JULI
	    //PROYEK
		$julp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julp)) {
	    	$julp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$julp = Cashoutd::find($julp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-07-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$julp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$julp = Cashoutd::find($julp);
	    	}
	    }

	    //DEPARTEMEN
		$juld = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($juld)) {
	    	$juld = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$juld = Cashoutd::find($juld);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-07-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$juld = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$juld = Cashoutd::find($juld);
	    	}
	    }

	    //FASILITAS
		$julf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julf)) {
	    	$julf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$julf = Cashoutd::find($julf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-07-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$julf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$julf = Cashoutd::find($julf);
	    	}
	    }

	    //AGUSTUS
	    //PROYEK
		$agtp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtp)) {
	    	$agtp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$agtp = Cashoutd::find($agtp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-08-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$agtp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$agtp = Cashoutd::find($agtp);
	    	}
	    }

	    //DEPARTEMEN
		$agtd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtd)) {
	    	$agtd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$agtd = Cashoutd::find($agtd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-08-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$agtd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$agtd = Cashoutd::find($agtd);
	    	}
	    }

	    //FASILITAS
		$agtf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtf)) {
	    	$agtf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$agtf = Cashoutd::find($agtf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-08-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$agtf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$agtf = Cashoutd::find($agtf);
	    	}
	    }

	    //SEPTEMBER
	    //PROYEK
		$sepp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepp)) {
	    	$sepp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$sepp = Cashoutd::find($sepp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-09-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$sepp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$sepp = Cashoutd::find($sepp);
	    	}
	    }

	    //DEPARTEMEN
		$sepd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepd)) {
	    	$sepd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$sepd = Cashoutd::find($sepd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-09-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$sepd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$sepd = Cashoutd::find($sepd);
	    	}
	    }

	    //FASILITAS
		$sepf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepf)) {
	    	$sepf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$sepf = Cashoutd::find($sepf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-09-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$sepf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$sepf = Cashoutd::find($sepf);
	    	}
	    }

	    //OKTOBER
	    //PROYEK
		$oktp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktp)) {
	    	$oktp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$oktp = Cashoutd::find($oktp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-10-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$oktp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$oktp = Cashoutd::find($oktp);
	    	}
	    }

	    //DEPARTEMEN
		$oktd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktd)) {
	    	$oktd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$oktd = Cashoutd::find($oktd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-10-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$oktd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$oktd = Cashoutd::find($oktd);
	    	}
	    }

	    //FASILITAS
		$oktf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktf)) {
	    	$oktf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$oktf = Cashoutd::find($oktf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-10-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$oktf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$oktf = Cashoutd::find($oktf);
	    	}
	    }

	    //NOVEMBER
	    //PROYEK
		$novp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novp)) {
	    	$novp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$novp = Cashoutd::find($novp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-11-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$novp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$novp = Cashoutd::find($novp);
	    	}
	    }

	    //DEPARTEMEN
		$novd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novd)) {
	    	$novd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$novd = Cashoutd::find($novd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-11-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$novd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$novd = Cashoutd::find($novd);
	    	}
	    }

	    //FASILITAS
		$novf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novf)) {
	    	$novf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$novf = Cashoutd::find($novf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-11-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$novf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$novf = Cashoutd::find($novf);
	    	}
	    }

	    //DESEMBER
	    //PROYEK
		$desp = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desp)) {
	    	$desp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$desp = Cashoutd::find($desp);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 1;
	    	$item->tgl_cash_out = $year."-12-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$desp = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$desp = Cashoutd::find($desp);
	    	}
	    }

	    //DEPARTEMEN
		$desd = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desd)) {
	    	$desd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$desd = Cashoutd::find($desd);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 2;
	    	$item->tgl_cash_out = $year."-12-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$desd = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$desd = Cashoutd::find($desd);
	    	}
	    }

	    //FASILITAS
		$desf = Cashoutd::where('proyek_id','=',$id)
				->where('cash_type', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desf)) {
	    	$desf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$desf = Cashoutd::find($desf);
	    } else {
	    	$item = new Cashoutd;
	    	$item->proyek_id = $id;
	    	$item->cash_type = 3;
	    	$item->tgl_cash_out = $year."-12-01";
	    	$item->nilai_cash_out = 0;
	    	$item->save();
	    	if($item) {
	    		$desf = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$desf = Cashoutd::find($desf);
	    	}
	    }

	    //CASHOUT
		$cashout = Cashout::where('proyek_id','=',$id)
				->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($cashout)) {
	    	$cashout = Cashout::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   	$cashout = Cashout::find($cashout);
	    } else {
	    	$item = new Cashout;
	    	$item->proyek_id = $id;
	    	$item->tgl_cash_out = $year."-12-01";
	    	$item->cash_proyek = 0;
	    	$item->cash_departemen = 0;
	    	$item->cash_fasilitas = 0;
	    	$item->save();
	    	if($item) {
	    		$cashout = Cashout::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
		            ->pluck('id');
		   		$cashout = Cashout::find($cashout);
	    	}
	    }
	   $cashin = Cashin::where('proyek_id','=',$id)
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->pluck('id');
	    $cashin = Cashin::find($cashin);
	    $sblum_droping = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )					
		            ->sum('nilai_cash_out');
	    $ssdah_droping = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )					
		            ->sum('nilai_cash_out');
		$total_droping = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
		            ->sum('nilai_cash_out');
		$sblum_depar = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )					
		            ->sum('nilai_cash_out');
	    $ssdah_depar = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )					
		            ->sum('nilai_cash_out');
		$total_depar = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
		            ->sum('nilai_cash_out');
		$sblum_fasilitas = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '<', $year )					
		            ->sum('nilai_cash_out');
	    $ssdah_fasilitas = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '>', $year )					
		            ->sum('nilai_cash_out');
		$total_fasilitas = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
		            ->sum('nilai_cash_out');
		$total_proyeksi = Cashoutd::where('proyek_id','=',$id)
		            ->sum('nilai_cash_out');
		$jumlah_p = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )					
		            ->sum('nilai_cash_out'); 
		$jumlah_d = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )					
		            ->sum('nilai_cash_out'); 
		$jumlah_f = Cashoutd::where('proyek_id','=',$id)
					->where('cash_type', '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )					
		            ->sum('nilai_cash_out');             
		return View::make('anggaran/cashout', compact('cashout', 'month', 'year', 'cashin', 'title',
			'sblum_droping', 'sblum_depar', 'sblum_fasilitas', 'ssdah_droping', 'ssdah_depar', 'ssdah_fasilitas',
			'total_proyeksi', 'total_droping', 'total_depar', 'total_fasilitas', 'jumlah_p', 'jumlah_d', 'jumlah_f',
			'jand', 'febd', 'mard', 'aprd', 'meid', 'jund', 'juld', 'agtd', 'sepd', 'oktd', 'novd', 'desd',
			'janp', 'febp', 'marp', 'aprp', 'meip', 'junp', 'julp', 'agtp', 'sepp', 'oktp', 'novp', 'desp',
			'janf', 'febf', 'marf', 'aprf', 'meif', 'junf', 'julf', 'agtf', 'sepf', 'oktf', 'novf', 'desf'));
		} elseif (Input::get('pilihan') == 'Omzet') {
		$id = Input::get('spk');
		$month = Input::get('month');
		$year = Input::get('year');

		//JANUARI
		$jan = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jan)) {
	    	$jan = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
		            ->pluck('id');
		   	$jan = Omzetd::find($jan);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-01-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$jan = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
		            ->pluck('id');
		   		$jan = Omzetd::find($jan);
	    	}
	    }

	    //FEBRUARI
	    $feb = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($feb)) {
	    	$feb = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$feb = Omzetd::find($feb);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-02-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$feb = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		   		$feb = Omzetd::find($feb);
	    	}
	    }

	    //MARET
	    $mar = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($mar)) {
	    	$mar = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$mar = Omzetd::find($mar);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-03-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$mar = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		   		$mar = Omzetd::find($mar);
	    	}
	    }

	    //APRIL
	    $apr = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($apr)) {
	    	$apr = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$apr = Omzetd::find($apr);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-04-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$apr = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		   		$apr = Omzetd::find($apr);
	    	}
	    }

	    //MEI
	    $mei = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($mei)) {
	    	$mei = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$mei = Omzetd::find($mei);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-05-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$mei = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		   		$mei = Omzetd::find($mei);
	    	}
	    }

	    //JUNI
	    $jun = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($jun)) {
	    	$jun = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$jun = Omzetd::find($jun);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-06-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$jun = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		   		$jun = Omzetd::find($jun);
	    	}
	    }

	    //JULI
	    $jul = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($jul)) {
	    	$jul = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		   	$jul = Omzetd::find($jul);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-07-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$jul = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		    	$jul = Omzetd::find($jul);
	    	}
	    }

	    //AGUSTUS
	    $agt = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($agt)) {
	    	$agt = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		    $agt = Omzetd::find($agt);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-08-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$agt = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		        $agt = Omzetd::find($agt);
	    	}
	    }

	    //SEPTEMBER
	    $sep = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($sep)) {
	    	$sep = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		    $sep = Omzetd::find($sep);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-09-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$sep = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		        $sep = Omzetd::find($sep);
	    	}
	    }

	    //OKTOBER
	    $okt = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($okt)) {
	    	$okt = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		    $okt = Omzetd::find($okt);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-10-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$okt = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		        $okt = Omzetd::find($okt);
	    	}
	    }

	    //NOVEMBER
	    $nov = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($nov)) {
	    	$nov = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		    $nov = Omzetd::find($nov);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-11-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$nov = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		        $nov = Omzetd::find($nov);
	    	}
	    }

	    //DESEMBER
	    $des = Omzetd::where('proyek_id','=',$id)
				->where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
	            ->pluck('id');
	    if (is_numeric($des)) {
	    	$des = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
		            ->pluck('id');
		    $des = Omzetd::find($des);
	    } else {
	    	$item = new Omzetd;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-12-01";
	    	$item->nilai_omzet = 0;
	    	$item->save();
	    	if($item) {
	    		$des = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->pluck('id');
		        $des = Omzetd::find($des);
	    	}
	    }

		//OMZET
		$omzet = Omzet::where('proyek_id','=',$id)
				->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($omzet)) {
	    	$omzet = Omzet::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
		            ->pluck('id');
		   	$omzet = Omzet::find($omzet);
	    } else {
	    	$item = new Omzet;
	    	$item->proyek_id = $id;
	    	$item->tgl_omzet = $year."-10-01";
	    	$item->sbu = "-";
	    	$item->sumber_dana = "-";
	    	$item->perolehan_dana = "-";
	    	$item->proyeksi = 0;
	    	$item->save();
	    	if($item) {
	    		$omzet = Omzet::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
		            ->pluck('id');
		   		$omzet = Omzet::find($omzet);
	    	}
	    }

	    //CASHIN
		$cashin = Cashin::where('proyek_id','=',$id)
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->pluck('id');
	    $cashin = Cashin::find($cashin);
	    $proyeksi_sbelum = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_omzet)'), '<', $year )					
		            ->sum('nilai_omzet');
		$jumlah_th = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )					
		            ->sum('nilai_omzet');
	    $proyeksi_ssdah = Omzetd::where('proyek_id','=',$id)
					->where(DB::raw('YEAR(tgl_omzet)'), '>', $year )					
		            ->sum('nilai_omzet');
		$total_proyeksi = Omzetd::where('proyek_id','=',$id)
		            ->sum('nilai_omzet');
		return View::make('anggaran/omzet', compact('omzet', 'cashin', 'month', 'year', 'title', 'proyeksi_sbelum', 'proyeksi_ssdah',
			'jan', 'feb', 'mar', 'mei','apr', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des', 'total_proyeksi', 'jumlah_th'));
		}
	}

	public function selesai()
	{
		$title = "Anggaran - Selesai";
		return View::make('anggaran/done', compact('title'));
	}

	public function index()
	{
		$title = "Anggaran - Selesai";
		$title = "Proyek";
		if (Auth::user()->level == 'user') {
			$id = Auth::user()->id;
			$spk = Proyek::where('user_id', '=', $id)
				->lists('spk', 'id');
		} else {
			$spk = Proyek::lists('spk', 'id');
		}
		return View::make('anggaran/index', compact('spk', 'title'));
	}

}
