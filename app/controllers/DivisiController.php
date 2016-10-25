<?php

class DivisiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = "Divisi - Search";
		$spk = Div::lists('spk', 'id');
		return View::make('guest/divisi', compact('spk', 'title'));
	}
	
	public function redirect()
	{
		return Redirect::to('admin/divisi')->with('message', 'masukkan data terlebih dahulu');
	}

	public function loan()
	{
		$title = "Divisi - Loan";
		$id = Input::get('spk');
		$month = Input::get('month');
		$year = Input::get('year');

		$date = $year."-".$month."-"."1";
		$loanExists = Loandiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month,$id, $year)
            	{
	                $query->where('divisi_id','=',$id)
	                		->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
	            ->pluck('id');
		if (is_numeric($loanExists)) {
			$loandiv = Loandiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
	            })
	            ->pluck('id'); 
			$loandiv = Loandiv::find($loandiv);			
	        return View::make('rkddivisi/loan', compact('loandiv', 'year', 'month', 'title'));
		} else {
			$item = new Loandiv;
			$item->divisi_id = $id;
			$item->cash_in = 0;
			$item->cash_out = 0;
			$item->cash_dwi1 = 0;
			$item->cash_dwi2 = 0;
			$item->tgl_dwi1 = $year."-".$month."-"."1";
			$item->tgl_dwi2 = $year."-".$month."-"."15";
			$item->cash_konvensional = 0;
			$item->cash_bank = 0;
			$item->save();
			if ($item) {
				$loandiv = Loandiv::where('divisi_id','=',$id)
					->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
					->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
					->orWhere(function($query) use($month, $year)
	            	{
		                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
								->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
		            })
		            ->pluck('id');
				$loandiv = Loandiv::find($loandiv);			
	        	return View::make('rkddivisi/loan', compact('loandiv', 'year', 'month', 'title'));
			} else {
				return Redirect::back();
			}
		} 
	}

	public function cashout()
	{
		$title = "Divisi - Cash Out";
		$id = Input::get('id');
		$month = Input::get('month');
		$year = Input::get('year');

		//PEMASARAN(A)/SEKRETARIAT(B)/FASILITAS(C)/PERSONALIA(D)/KEUANGAN(E)/KENDARAAN(F)/UMUM(G)
		//JANUARI 
		//PEMASARAN
		$jana = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jana)) {
	    	$jana = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jana = Cashoutddiv::find($jana);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jana = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jana = Cashoutddiv::find($jana);
	    	}
	    }

	    //SEKRETARIAT
		$janb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($janb)) {
	    	$janb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$janb = Cashoutddiv::find($janb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$janb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$janb = Cashoutddiv::find($janb);
	    	}
	    }

	    //FASILITAS
		$janc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($janc)) {
	    	$janc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$janc = Cashoutddiv::find($janc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$janc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$janc = Cashoutddiv::find($janc);
	    	}
	    }

	    //PERSONALIA
		$jand = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jand)) {
	    	$jand = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jand = Cashoutddiv::find($jand);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jand = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jand = Cashoutddiv::find($jand);
	    	}
	    }

	    //KEUANGAN
		$jane = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jane)) {
	    	$jane = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jane = Cashoutddiv::find($jane);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jane = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jane = Cashoutddiv::find($jane);
	    	}
	    }

	    //KENDARAAN
		$janf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($janf)) {
	    	$janf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$janf = Cashoutddiv::find($janf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$janf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$janf = Cashoutddiv::find($janf);
	    	}
	    }

	    //UMUM
		$jang = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jang)) {
	    	$jang = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jang = Cashoutddiv::find($jang);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-01-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jang = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jang = Cashoutddiv::find($jang);
	    	}
	    }

	    //TOTAL Januari
	    $jan = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //FEBRUARI
	    //PEMASARAN
		$feba = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($feba)) {
	    	$feba = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$feba = Cashoutddiv::find($feba);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$feba = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$feba = Cashoutddiv::find($feba);
	    	}
	    }

	    //SEKRETARIAT
		$febb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febb)) {
	    	$febb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febb = Cashoutddiv::find($febb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febb = Cashoutddiv::find($febb);
	    	}
	    }

	    //FASILITAS
		$febc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febc)) {
	    	$febc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febc = Cashoutddiv::find($febc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febc = Cashoutddiv::find($febc);
	    	}
	    }

	    //PERSONALIA
		$febd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febd)) {
	    	$febd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febd = Cashoutddiv::find($febd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febd = Cashoutddiv::find($febd);
	    	}
	    }

	    //KEUANGAN
		$febe = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febe)) {
	    	$febe = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febe = Cashoutddiv::find($febe);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febe = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febe = Cashoutddiv::find($febe);
	    	}
	    }

	    //KENDARAAN
		$febf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febf)) {
	    	$febf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febf = Cashoutddiv::find($febf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febf = Cashoutddiv::find($febf);
	    	}
	    }

	    //UMUM
		$febg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($febg)) {
	    	$febg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$febg = Cashoutddiv::find($febg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-02-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$febg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$febg = Cashoutddiv::find($febg);
	    	}
	    }

	    //TOTAL Februari
	    $feb = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //MARET
	    //PEMASARAN
		$mara = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($mara)) {
	    	$mara = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$mara = Cashoutddiv::find($mara);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$mara = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$mara = Cashoutddiv::find($mara);
	    	}
	    }

	    //SEKRETARIAT
		$marb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marb)) {
	    	$marb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$marb = Cashoutddiv::find($marb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$marb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$marb = Cashoutddiv::find($marb);
	    	}
	    }

	    //FASILITAS
		$marc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marc)) {
	    	$marc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$marc = Cashoutddiv::find($marc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$marc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$marc = Cashoutddiv::find($marc);
	    	}
	    }

	    //PERSONALIA
		$mard = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($mard)) {
	    	$mard = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$mard = Cashoutddiv::find($mard);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$mard = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$mard = Cashoutddiv::find($mard);
	    	}
	    }

	    //KEUANGAN
		$mare = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($mare)) {
	    	$mare = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$mare = Cashoutddiv::find($mare);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$mare = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$mare = Cashoutddiv::find($mare);
	    	}
	    }

	    //KENDARAAN
		$marf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marf)) {
	    	$marf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$marf = Cashoutddiv::find($marf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$marf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$marf = Cashoutddiv::find($marf);
	    	}
	    }

	    //UMUM
		$marg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($marg)) {
	    	$marg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$marg = Cashoutddiv::find($marg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-03-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$marg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$marg = Cashoutddiv::find($marg);
	    	}
	    }

	    //TOTAL Maret
	    $mar = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //APRIL
	    //PEMASARAN
		$apra = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($apra)) {
	    	$apra = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$apra = Cashoutddiv::find($apra);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$apra = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$apra = Cashoutddiv::find($apra);
	    	}
	    }

	    //SEKRETARIAT
		$aprb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprb)) {
	    	$aprb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$aprb = Cashoutddiv::find($aprb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$aprb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$aprb = Cashoutddiv::find($aprb);
	    	}
	    }

	    //FASILITAS
		$aprc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprc)) {
	    	$aprc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$aprc = Cashoutddiv::find($aprc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$aprc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$aprc = Cashoutddiv::find($aprc);
	    	}
	    }

	    //PERSONALIA
		$aprd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprd)) {
	    	$aprd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$aprd = Cashoutddiv::find($aprd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$aprd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$aprd = Cashoutddiv::find($aprd);
	    	}
	    }

	    //KEUANGAN
		$apre = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($apre)) {
	    	$apre = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$apre = Cashoutddiv::find($apre);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$apre = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$apre = Cashoutddiv::find($apre);
	    	}
	    }

	    //KENDARAAN
		$aprf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprf)) {
	    	$aprf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$aprf = Cashoutddiv::find($aprf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$aprf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$aprf = Cashoutddiv::find($aprf);
	    	}
	    }

	    //UMUM
		$aprg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($aprg)) {
	    	$aprg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$aprg = Cashoutddiv::find($aprg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-04-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$aprg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$aprg = Cashoutddiv::find($aprg);
	    	}
	    }

	    //TOTAL April
	    $apr = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //MEI
	    //PEMASARAN
		$meia = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meia)) {
	    	$meia = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meia = Cashoutddiv::find($meia);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meia = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meia = Cashoutddiv::find($meia);
	    	}
	    }

	    //SEKRETARIAT
		$meib = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meib)) {
	    	$meib = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meib = Cashoutddiv::find($meib);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meib = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meib = Cashoutddiv::find($meib);
	    	}
	    }

	    //FASILITAS
		$meic = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meic)) {
	    	$meic = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meic = Cashoutddiv::find($meic);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meic = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meic = Cashoutddiv::find($meic);
	    	}
	    }

	    //PERSONALIA
		$meid = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meid)) {
	    	$meid = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meid = Cashoutddiv::find($meid);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meid = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meid = Cashoutddiv::find($meid);
	    	}
	    }

	    //KEUANGAN
		$meie = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meie)) {
	    	$meie = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meie = Cashoutddiv::find($meie);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meie = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meie = Cashoutddiv::find($meie);
	    	}
	    }

	    //KENDARAAN
		$meif = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meif)) {
	    	$meif = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meif = Cashoutddiv::find($meif);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meif = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meif = Cashoutddiv::find($meif);
	    	}
	    }

	    //UMUM
		$meig = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($meig)) {
	    	$meig = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$meig = Cashoutddiv::find($meig);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-05-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$meig = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$meig = Cashoutddiv::find($meig);
	    	}
	    }

	    //TOTAL Mei
	    $mei = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //JUNI
	    //PEMASARAN
		$juna = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($juna)) {
	    	$juna = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$juna = Cashoutddiv::find($juna);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$juna = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$juna = Cashoutddiv::find($juna);
	    	}
	    }

	    //SEKRETARIAT
		$junb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($junb)) {
	    	$junb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$junb = Cashoutddiv::find($junb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$junb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$junb = Cashoutddiv::find($junb);
	    	}
	    }

	    //FASILITAS
		$junc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($junc)) {
	    	$junc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$junc = Cashoutddiv::find($junc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$junc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$junc = Cashoutddiv::find($junc);
	    	}
	    }

	    //PERSONALIA
		$jund = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jund)) {
	    	$jund = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jund = Cashoutddiv::find($jund);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jund = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jund = Cashoutddiv::find($jund);
	    	}
	    }

	    //KEUANGAN
		$june = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($june)) {
	    	$june = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$june = Cashoutddiv::find($june);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$june = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$june = Cashoutddiv::find($june);
	    	}
	    }

	    //KENDARAAN
		$junf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($junf)) {
	    	$junf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$junf = Cashoutddiv::find($junf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$junf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$junf = Cashoutddiv::find($junf);
	    	}
	    }

	    //UMUM
		$jung = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jung)) {
	    	$jung = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jung = Cashoutddiv::find($jung);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-06-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jung = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jung = Cashoutddiv::find($jung);
	    	}
	    }

	    //TOTAL Juni
	    $jun = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //JULI
	    //PEMASARAN
		$jula = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jula)) {
	    	$jula = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jula = Cashoutddiv::find($jula);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jula = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jula = Cashoutddiv::find($jula);
	    	}
	    }

	    //SEKRETARIAT
		$julb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julb)) {
	    	$julb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$julb = Cashoutddiv::find($julb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$julb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$julb = Cashoutddiv::find($julb);
	    	}
	    }

	    //FASILITAS
		$julc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julc)) {
	    	$julc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$julc = Cashoutddiv::find($julc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$julc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$julc = Cashoutddiv::find($julc);
	    	}
	    }

	    //PERSONALIA
		$juld = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($juld)) {
	    	$juld = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$juld = Cashoutddiv::find($juld);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$juld = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$juld = Cashoutddiv::find($juld);
	    	}
	    }

	    //KEUANGAN
		$jule = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($jule)) {
	    	$jule = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$jule = Cashoutddiv::find($jule);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$jule = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$jule = Cashoutddiv::find($jule);
	    	}
	    }

	    //KENDARAAN
		$julf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julf)) {
	    	$julf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$julf = Cashoutddiv::find($julf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$julf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$julf = Cashoutddiv::find($julf);
	    	}
	    }

	    //UMUM
		$julg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($julg)) {
	    	$julg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$julg = Cashoutddiv::find($julg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-07-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$julg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$julg = Cashoutddiv::find($julg);
	    	}
	    }

	    //TOTAL Juli
	    $jul = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //AGUSTUS
	    //PEMASARAN
		$agta = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agta)) {
	    	$agta = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agta = Cashoutddiv::find($agta);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agta = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agta = Cashoutddiv::find($agta);
	    	}
	    }

	    //SEKRETARIAT
		$agtb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtb)) {
	    	$agtb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agtb = Cashoutddiv::find($agtb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agtb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agtb = Cashoutddiv::find($agtb);
	    	}
	    }

	    //FASILITAS
		$agtc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtc)) {
	    	$agtc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agtc = Cashoutddiv::find($agtc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agtc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agtc = Cashoutddiv::find($agtc);
	    	}
	    }

	    //PERSONALIA
		$agtd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtd)) {
	    	$agtd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agtd = Cashoutddiv::find($agtd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agtd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agtd = Cashoutddiv::find($agtd);
	    	}
	    }

	    //KEUANGAN
		$agte = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agte)) {
	    	$agte = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agte = Cashoutddiv::find($agte);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agte = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agte = Cashoutddiv::find($agte);
	    	}
	    }

	    //KENDARAAN
		$agtf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtf)) {
	    	$agtf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agtf = Cashoutddiv::find($agtf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agtf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agtf = Cashoutddiv::find($agtf);
	    	}
	    }

	    //UMUM
		$agtg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($agtg)) {
	    	$agtg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$agtg = Cashoutddiv::find($agtg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-08-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$agtg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$agtg = Cashoutddiv::find($agtg);
	    	}
	    }

	    //TOTAL Agustus
	    $agt = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //SEPTEMBER
	    //PEMASARAN
		$sepa = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepa)) {
	    	$sepa = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepa = Cashoutddiv::find($sepa);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepa = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepa = Cashoutddiv::find($sepa);
	    	}
	    }

	    //SEKRETARIAT
		$sepb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepb)) {
	    	$sepb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepb = Cashoutddiv::find($sepb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepb = Cashoutddiv::find($sepb);
	    	}
	    }

	    //FASILITAS
		$sepc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepc)) {
	    	$sepc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepc = Cashoutddiv::find($sepc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepc = Cashoutddiv::find($sepc);
	    	}
	    }

	    //PERSONALIA
		$sepd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepd)) {
	    	$sepd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepd = Cashoutddiv::find($sepd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepd = Cashoutddiv::find($sepd);
	    	}
	    }

	    //KEUANGAN
		$sepe = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepe)) {
	    	$sepe = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepe = Cashoutddiv::find($sepe);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepe = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepe = Cashoutddiv::find($sepe);
	    	}
	    }

	    //KENDARAAN
		$sepf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepf)) {
	    	$sepf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepf = Cashoutddiv::find($sepf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepf = Cashoutddiv::find($sepf);
	    	}
	    }

	    //UMUM
		$sepg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($sepg)) {
	    	$sepg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$sepg = Cashoutddiv::find($sepg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-09-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$sepg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$sepg = Cashoutddiv::find($sepg);
	    	}
	    }

	    //TOTAL September
	    $sep = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //OKTOBER
	    //PEMASARAN
		$okta = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($okta)) {
	    	$okta = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$okta = Cashoutddiv::find($okta);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$okta = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$okta = Cashoutddiv::find($okta);
	    	}
	    }

	    //SEKRETARIAT
		$oktb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktb)) {
	    	$oktb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$oktb = Cashoutddiv::find($oktb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$oktb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$oktb = Cashoutddiv::find($oktb);
	    	}
	    }

	    //FASILITAS
		$oktc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktc)) {
	    	$oktc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$oktc = Cashoutddiv::find($oktc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$oktc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$oktc = Cashoutddiv::find($oktc);
	    	}
	    }

	    //PERSONALIA
		$oktd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktd)) {
	    	$oktd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$oktd = Cashoutddiv::find($oktd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$oktd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$oktd = Cashoutddiv::find($oktd);
	    	}
	    }

	    //KEUANGAN
		$okte = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($okte)) {
	    	$okte = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$okte = Cashoutddiv::find($okte);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$okte = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$okte = Cashoutddiv::find($okte);
	    	}
	    }

	    //KENDARAAN
		$oktf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktf)) {
	    	$oktf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$oktf = Cashoutddiv::find($oktf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$oktf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$oktf = Cashoutddiv::find($oktf);
	    	}
	    }

	    //UMUM
		$oktg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($oktg)) {
	    	$oktg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$oktg = Cashoutddiv::find($oktg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$oktg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$oktg = Cashoutddiv::find($oktg);
	    	}
	    }

	    //TOTAL Oktober
	    $okt = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //NOVEMBER
	    //PEMASARAN
		$nova = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($nova)) {
	    	$nova = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$nova = Cashoutddiv::find($nova);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$nova = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$nova = Cashoutddiv::find($nova);
	    	}
	    }

	    //SEKRETARIAT
		$novb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novb)) {
	    	$novb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$novb = Cashoutddiv::find($novb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$novb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$novb = Cashoutddiv::find($novb);
	    	}
	    }

	    //FASILITAS
		$novc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novc)) {
	    	$novc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$novc = Cashoutddiv::find($novc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$novc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$novc = Cashoutddiv::find($novc);
	    	}
	    }

	    //PERSONALIA
		$novd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novd)) {
	    	$novd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$novd = Cashoutddiv::find($novd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$novd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$novd = Cashoutddiv::find($novd);
	    	}
	    }

	    //KEUANGAN
		$nove = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($nove)) {
	    	$nove = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$nove = Cashoutddiv::find($nove);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$nove = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$nove = Cashoutddiv::find($nove);
	    	}
	    }

	    //KENDARAAN
		$novf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novf)) {
	    	$novf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$novf = Cashoutddiv::find($novf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$novf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$novf = Cashoutddiv::find($novf);
	    	}
	    }

	    //UMUM
		$novg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($novg)) {
	    	$novg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$novg = Cashoutddiv::find($novg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-11-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$novg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$novg = Cashoutddiv::find($novg);
	    	}
	    }

	    //TOTAL November
	    $nov = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //DESEMBER
	    //PEMASARAN
		$desa = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 1 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desa)) {
	    	$desa = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desa = Cashoutddiv::find($desa);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 1;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desa = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 1 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desa = Cashoutddiv::find($desa);
	    	}
	    }

	    //SEKRETARIAT
		$desb = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 2 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desb)) {
	    	$desb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desb = Cashoutddiv::find($desb);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 2;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desb = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 2 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desb = Cashoutddiv::find($desb);
	    	}
	    }

	    //FASILITAS
		$desc = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 3 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desc)) {
	    	$desc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desc = Cashoutddiv::find($desc);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 3;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desc = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 3 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desc = Cashoutddiv::find($desc);
	    	}
	    }

	    //PERSONALIA
		$desd = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 4 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desd)) {
	    	$desd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desd = Cashoutddiv::find($desd);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 4;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desd = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 4 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desd = Cashoutddiv::find($desd);
	    	}
	    }

	    //KEUANGAN
		$dese = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 5 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($dese)) {
	    	$dese = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$dese = Cashoutddiv::find($dese);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 5;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$dese = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 5 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$dese = Cashoutddiv::find($dese);
	    	}
	    }

	    //KENDARAAN
		$desf = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 6 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desf)) {
	    	$desf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desf = Cashoutddiv::find($desf);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 6;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desf = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 6 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 )
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desf = Cashoutddiv::find($desf);
	    	}
	    }

	    //UMUM
		$desg = Cashoutddiv::where('divisi_id','=',$id)
				->where('cashout_id', '=', 7 ) 
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($desg)) {
	    	$desg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   	$desg = Cashoutddiv::find($desg);
	    } else {
	    	$item = new Cashoutddiv;
	    	$item->divisi_id = $id;
	    	$item->cashout_id = 7;
	    	$item->tgl_cashout = $year."-12-01";
	    	$item->nilai_cashout = 0;
	    	$item->save();
	    	if($item) {
	    		$desg = Cashoutddiv::where('divisi_id','=',$id)
					->where('cashout_id', '=', 7 ) 
					->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
		            ->pluck('id');
		   		$desg = Cashoutddiv::find($desg);
	    	}
	    }

	    //TOTAL Desember
	    $des = Cashoutddiv::where('divisi_id','=',$id)
				->where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->sum('nilai_cashout');

	    //CASHOUT
		$cashoutdiv = Cashoutdiv::where('divisi_id','=',$id)
				->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->pluck('id');
	    if (is_numeric($cashoutdiv)) {
	    	$cashoutdiv = Cashoutdiv::where('divisi_id','=',$id)
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
		            ->pluck('id');
		   	$cashoutdiv = Cashoutdiv::find($cashoutdiv);
	    } else {
	    	$item = new Cashoutdiv;
	    	$item->divisi_id = $id;
	    	$item->tgl_cashout = $year."-10-01";
	    	$item->pemasaran = 0;
	    	$item->sekretariat = 0;
	    	$item->fasilitas = 0;
	    	$item->personalia = 0;
	    	$item->keuangan = 0;
	    	$item->kendaraan = 0;
	    	$item->umum = 0;
	    	$item->save();
	    	if($item) {
	    		$cashoutdiv = Cashoutdiv::where('divisi_id','=',$id)
					->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
		            ->pluck('id');
		   		$cashoutdiv = Cashoutdiv::find($cashoutdiv);
	    	}
	    }
	    
	    $ok_netto1 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('pemasaran');
        $ok_netto2 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('sekretariat');
        $ok_netto3 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('fasilitas');
        $ok_netto4 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('personalia');
        $ok_netto5 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('keuangan');
        $ok_netto6 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('kendaraan');
        $ok_netto7 = Cashoutdiv::where('divisi_id','=',$id)
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('umum');
        $ok_netto = $ok_netto1+$ok_netto2+$ok_netto3+$ok_netto4+$ok_netto5+$ok_netto6+$ok_netto7;

	    //Realisasi dari tanggal ke tanggal
	    $nowDate = $month-1;
	    $awal = new dateTime($year."-01-01");
	    $akhir = new dateTime($year."-".$nowDate."-28");
	    //Realisasi pemasaran
	    $pemasaran = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 1 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //Realisasi sekretariat
        $sekretariat = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 2 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //Realisasi fasilitas
        $fasilitas = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 3 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //Realisasi personalia
        $personalia = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 4 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //Realisasi keuangan
        $keuangan = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 5 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //Realisasi kendaraan
        $kendaraan = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 6 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
	    //umum
        $umum = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 7 )
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
     	
     	$proyeksi = Cashoutddiv::where('divisi_id','=',$id)
			->whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');
        $a = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 1 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $b = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 2 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $c = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 3 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $d = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 4 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $e = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 5 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $f = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 6 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
        $g = Cashoutddiv::where('divisi_id','=',$id)
			->where('cashout_id', '=', 7 )
			->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('nilai_cashout');
       
	   return View::make('rkddivisi/cashout', compact('cashoutdiv', 'year', 'month', 'title',
	    	'jana', 'feba', 'mara', 'apra', 'meia', 'juna', 'jula', 'agta', 'sepa', 'okta', 'nova', 'desa',
	    	'janb', 'febb', 'marb', 'aprb', 'meib', 'junb', 'julb', 'agtb', 'sepb', 'oktb', 'novb', 'desb',
	    	'janc', 'febc', 'marc', 'aprc', 'meic', 'junc', 'julc', 'agtc', 'sepc', 'oktc', 'novc', 'desc',
	    	'jand', 'febd', 'mard', 'aprd', 'meid', 'jund', 'juld', 'agtd', 'sepd', 'oktd', 'novd', 'desd',
	    	'jane', 'febe', 'mare', 'apre', 'meie', 'june', 'jule', 'agte', 'sepe', 'okte', 'nove', 'dese',
	    	'janf', 'febf', 'marf', 'aprf', 'meif', 'junf', 'julf', 'agtf', 'sepf', 'oktf', 'novf', 'desf',
	    	'jang', 'febg', 'marg', 'aprg', 'meig', 'jung', 'julg', 'agtg', 'sepg', 'oktg', 'novg', 'desg',
	    	'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des',
	    	'pemasaran', 'sekretariat', 'fasilitas', 'personalia', 'keuangan', 'kendaraan', 'umum', 'proyeksi', 'ok_netto',
	    	'a', 'b', 'c', 'd', 'e', 'f', 'g'
	    	));
	}

	public function selesai()
	{
		$title = "Divisi - Selesai";
		$year = Input::get('year');
		$month = Input::get('month');
		$id = Input::get('divisi_id');

		if (Input::hasFile('document'))
        {
            $files = Input::file('document');
            $rules = [
                'file' => 'required|max:20000|mimes:xls,xlsx,pdf'
            ];
            $destinationPath = public_path().'\uploads';

            foreach ($files as $one)
            {
                $v = Validator::make(['file' => $one], $rules);
                if ($v->passes())
                {
                    $filename       = 'divisi-'.$one->getClientOriginalName();
                    $upload_success = $one->move($destinationPath, $filename);
                    //SAVE
					$item = new Upload;
					$item->divisi_id = $id;
					$item->original_name = $filename;
					$item->filename = $filename;
					$item->date = $year."-".$month."-"."1";
					$item->save();
                    if ($upload_success && $item)
                    {
                        $done[] = $filename;
                        Session::flash('done', $done);
                    }
                }
                else
                {
                    $filename = $one->getClientOriginalName();
                    $not[] = $filename;
                    Session::flash('not', $not);
                }
            }
            return View::make('rkddivisi/done', compact('title'))->withErrors($v);
        }
        return View::make('rkddivisi/done', compact('title'));
	}

	public function updateLoan()
    {
        $inputs = Input::all();      
        if ($inputs['value'] == null) {
              	$value = 0;
            } else {
            	$value = $inputs['value'];
            }
        $item = Loandiv::find($inputs['pk']);
        $item->$inputs['name'] = $value;
        $item->save();
    }

	public function updateCashout()
    {
        $inputs = Input::all();
        if ($inputs['value'] == null) {
              	$value = 0;
            } else {
            	$value = $inputs['value'];
            }      
        $item = Cashoutdiv::find($inputs['pk']);
        $item->$inputs['name'] = $value;
        $item->save();
    }

    public function updateCashoutd()
    {
        $inputs = Input::all();
        if ($inputs['value'] == null) {
              	$value = 0;
            } else {
            	$value = $inputs['value'];
            }      
        $item = Cashoutddiv::find($inputs['pk']);
        $item->$inputs['name'] = $value;
        $item->save();
    }

    public function file()
    {
		$title = "Divisi - File";	
        $file = Upload::where('divisi_id', '!=', 0)
        		->where('proyek_id', '=', 0)
        		->paginate(10);
		return View::make('divisi/file', compact('file', 'title'));
    }

    public function get($filename)
    {
    	$file_path = public_path().'\uploads/'. $filename;
	    if (file_exists($file_path))
	    {
	        // Send Download
	        return Response::download($file_path, $filename, [
	            'Content-Length: '. filesize($file_path)
	        ]);
	    }
	    else
	    {
	        // Error
	        exit('Requested file does not exist on our server!');
	    }
	}

	public function delFile($filename)
    {
    	$file_path = public_path()."\uploads/".$filename;
	    File::delete($file_path);
				DB::table('file')->where('filename', '=', $filename)->delete();
			return Redirect::back()->with('message','Operation Successful !');
			
	}
}
