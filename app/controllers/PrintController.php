<?php


class PrintController extends \BaseController {

	public function printTermin()
	{
		$title = "Konsolidasi - Termin";
		$month = Input::get('month');
		$year = Input::get('year');

		$dateSelect = new dateTime($year."-".$month."-"."1");
		$dateMin = DB::table('proyeks')->min('tgl_proyek');
		$minDate = new dateTime($dateMin);
		
		if ($minDate < $dateSelect) {
			$termin = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->where('cash_dwi1','!=','0')
				->where('cash_dwi2','!=','0')
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where('cash_dwi1','!=','0')
							->where('cash_dwi2','!=','0')
							->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
	            ->get();
	        $termin_id = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->where('cash_dwi1','!=','0')
				->where('cash_dwi2','!=','0')
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where('cash_dwi1','!=','0')
							->where('cash_dwi2','!=','0')
							->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
	            ->lists('proyek_id');
	        $noTermin = Proyek::whereNotIn('id',$termin_id )->get();
	        
	        $cash_dwi1 = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('cash_dwi1');
	        $cash_dwi2 = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('cash_dwi2');
	        $realisasi = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('realisasi');
	        return View::make('print/termin', compact('termin', 'year', 'month', 'cash_dwi1',
	         'cash_dwi2', 'realisasi', 'title', 'noTermin'));
	        
		} else {
			return Redirect::back()->with('message', 'Data Pada Bulan Dan Tahun yang dipilih Tidak Ditemukan ');
		}
	}

	public function printLoan()
	{
		$title = "Konsolidasi - Loan";
		$month = Input::get('month');
		$year = Input::get('year');

		$loan = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->get();
        $loan_get = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->lists('proyek_id');
        $loan_id = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->lists('proyek_id');
        $noLoan = Proyek::whereNotIn('id', $loan_id)->get();
        $cash_in = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_in');
        $cash_out = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_out');
        $cash_dwi1 = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi1');
        $cash_dwi2 = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi2');
        $cash_konvensional = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_konvensional');
        $cash_bank = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_bank');
        $accept_cashdwi = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->sum('accept_cashdwi');
        $accept_cashkon = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->sum('accept_cashkon');
	    $loandiv = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
             ->get();
        $cash_ind = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_in');
        $cash_outd = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_out');
        $cash_dwi1d = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi1');
        $cash_dwi2d = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi2');
        $cash_konvensionald = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_konvensional');
        $cash_bankd = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_bank');

	    return View::make('print/loan', compact('loan', 'loandiv', 'year', 'month', 'title', 'noLoan',
	    	'cash_in', 'cash_out', 'cash_dwi1', 'cash_dwi2', 'cash_konvensional', 'cash_bank',
	    	'cash_ind', 'cash_outd', 'cash_dwi1d', 'cash_dwi2d', 'cash_konvensionald', 'cash_bankd',
	    	'accept_cashdwi', 'accept_cashkon', 'loan_get'));
	}

	public function printCashin()
	{
		$title = "Konsolidasi - Cash In";
		$month = Input::get('month');
		$year = Input::get('year');

		$cashin = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->get();
	    $cashin_id = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
            ->lists('proyek_id');
        $noCashin = Proyek::whereNotIn('id', $cashin_id)->get();
	    $proyeksi = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->sum('proyeksi');
	    $jan = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $feb = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $mar = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $apr = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $mei = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $jun = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $jul = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $agt = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $sep = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $okt = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $nov = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $des = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
		return View::make('print/cashin', compact('month' , 'year', 'cashin', 'noCashin', 'proyeksi', 'title',
			'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des'));
	}

	public function printCashout()
	{
		$title = "Konsolidasi - Cash Out";
		$month = Input::get('month');
		$year = Input::get('year');

	    //CASHOUT
		$cashout = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->get();
	    $cashout_id = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
            ->lists('proyek_id');
        $noCashout = Proyek::whereNotIn('id', $cashout_id)->get();
		$proyeksi_proyek1 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_proyek');
	    $proyeksi_proyek2 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_departemen');
	    $proyeksi_proyek3 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_fasilitas');
	    $proyeksi_proyek = $proyeksi_proyek1+$proyeksi_proyek2+$proyeksi_proyek3;
	    $jan_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$feb_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$mar_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$apr_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$mei_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$jun_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$jul_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$agt_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$sep_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$okt_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$nov_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$des_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');

		$jan_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$feb_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$mar_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$apr_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$mei_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$jun_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$jul_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$agt_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$sep_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$okt_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$nov_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$des_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');

		$ok_netto1 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('pemasaran');
        $ok_netto2 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('sekretariat');
        $ok_netto3 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('fasilitas');
        $ok_netto4 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('personalia');
        $ok_netto5 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('keuangan');
        $ok_netto6 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('kendaraan');
        $ok_netto7 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('umum');
        $ok_netto_divisi = $ok_netto1+$ok_netto2+$ok_netto3+$ok_netto4+$ok_netto5+$ok_netto6+$ok_netto7;
     
       	$awal = new dateTime($year."-01-01");
	    $akhir = new dateTime($year."-".$month."-28");
        $proyeksi_divisi = Cashoutddiv::whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');

	    $cashoutdiv = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->get();

		return View::make('print/cashout', compact('cashout', 'month', 'year', 'cashoutdiv', 'noCashout', 'proyeksi_proyek',
	    	'pemasaran', 'sekretariat', 'fasilitas', 'personalia', 'keuangan', 'kendaraan', 'umum',
			'jan_proyek', 'feb_proyek', 'mar_proyek', 'apr_proyek', 'mei_proyek', 'jun_proyek', 'ok_netto_divisi',
			'jul_proyek', 'agt_proyek', 'sep_proyek', 'okt_proyek', 'nov_proyek', 'des_proyek', 'proyeksi_divisi',
			'jan_divisi', 'feb_divisi', 'mar_divisi', 'apr_divisi', 'mei_divisi', 'jun_divisi', 
			'jul_divisi', 'agt_divisi', 'sep_divisi', 'okt_divisi', 'nov_divisi', 'des_divisi', 'title'
			));
	}

	public function printOmzet()
	{
		$title = "Konsolidasi - Omzet";
		$month = Input::get('month');
		$year = Input::get('year');
		$awal = new dateTime($year."-01-01");
		$akhir = new dateTime($year."-".$month."-28");
		$omzet_id = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
            ->lists('proyek_id');
        $noOmzet = Proyek::whereNotIn('id', $omzet_id)->get();

		$rkap = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
					->sum('ok_netto');
        $jan_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$feb_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$mar_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$apr_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$mei_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$jun_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$jul_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$agt_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$sep_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$okt_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$nov_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$des_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$total_omzet = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		//OMZET
		$omzet = Omzet::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
	            ->get();

		return View::make('print/omzet', compact('omzet', 'year', 'month', 'rkap', 'noOmzet', 'title',
			'jan_omzet', 'feb_omzet', 'mar_omzet', 'apr_omzet', 'mei_omzet', 'jun_omzet', 'total_omzet',
			'jul_omzet', 'agt_omzet', 'sep_omzet', 'okt_omzet', 'nov_omzet', 'des_omzet'));
	}

	public function saveTermin()
	{
		$title = "Konsolidasi - Termin";
		$month = Input::get('month');
		$year = Input::get('year');

		$dateSelect = new dateTime($year."-".$month."-"."1");
		$dateMin = DB::table('proyeks')->min('tgl_proyek');
		$minDate = new dateTime($dateMin);
		
		if ($minDate < $dateSelect) {
			$termin = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->where('cash_dwi1','!=','0')
				->where('cash_dwi2','!=','0')
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where('cash_dwi1','!=','0')
							->where('cash_dwi2','!=','0')
							->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
	            ->get();
	        $termin_id = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->where('cash_dwi1','!=','0')
				->where('cash_dwi2','!=','0')
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where('cash_dwi1','!=','0')
							->where('cash_dwi2','!=','0')
							->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
	            ->lists('proyek_id');
	        $noTermin = Proyek::whereNotIn('id',$termin_id )->get();
	        
	        $cash_dwi1 = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('cash_dwi1');
	        $cash_dwi2 = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('cash_dwi2');
	        $realisasi = Termin::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
				->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
				->orWhere(function($query) use($month, $year)
            	{
	                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
							->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
	            })
            	->sum('realisasi');
            //return View::make('print/savetermin', compact('termin', 'year', 'month', 'cash_dwi1','cash_dwi2', 'realisasi', 'title', 'noTermin'));
			return PDF::loadHTML(View::make('print/savetermin', compact('termin', 'year', 'month', 'cash_dwi1','cash_dwi2', 'realisasi', 'title', 'noTermin')))
						->setPaper('A4')
						->setOrientation('landscape')
						->download('Termin Bulan '.$month.' Tahun '.$year.'.pdf');

		} else {
			return Redirect::back()->with('message', 'Data Pada Bulan Dan Tahun yang dipilih Tidak Ditemukan ');
		}
	}

	public function saveLoan()
	{
		$title = "Konsolidasi - Loan";
		$month = Input::get('month');
		$year = Input::get('year');

		$loan = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->get();
        $loan_get = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->lists('proyek_id');
        $loan_id = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->lists('proyek_id');
        $noLoan = Proyek::whereNotIn('id', $loan_id)->get();
        $cash_in = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_in');
        $cash_out = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_out');
        $cash_dwi1 = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi1');
        $cash_dwi2 = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi2');
        $cash_konvensional = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_konvensional');
        $cash_bank = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_bank');
        $accept_cashdwi = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->sum('accept_cashdwi');
        $accept_cashkon = Loan::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi2)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi2)'), '=', $year );
            })
            ->sum('accept_cashkon');
	    $loandiv = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
             ->get();
        $cash_ind = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_in');
        $cash_outd = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_out');
        $cash_dwi1d = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi1');
        $cash_dwi2d = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_dwi2');
        $cash_konvensionald = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_konvensional');
        $cash_bankd = Loandiv::where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year )
			->orWhere(function($query) use($month, $year)
        	{
                $query->where(DB::raw('MONTH(tgl_dwi1)'), '=', $month ) 
						->where(DB::raw('YEAR(tgl_dwi1)'), '=', $year );
            })
            ->sum('cash_bank');

	   // return View::make('print/saveloan', compact('loan', 'loandiv', 'year', 'month', 'title', 'noLoan',
	    //	'cash_in', 'cash_out', 'cash_dwi1', 'cash_dwi2', 'cash_konvensional', 'cash_bank',
	    //	'cash_ind', 'cash_outd', 'cash_dwi1d', 'cash_dwi2d', 'cash_konvensionald', 'cash_bankd'));
	    return PDF::loadHTML(View::make('print/saveloan', compact('loan', 'loandiv', 'year', 'month', 'title', 'noLoan',
	    	'cash_in', 'cash_out', 'cash_dwi1', 'cash_dwi2', 'cash_konvensional', 'cash_bank',
	    	'cash_ind', 'cash_outd', 'cash_dwi1d', 'cash_dwi2d', 'cash_konvensionald', 'cash_bankd',
	    	'accept_cashdwi', 'accept_cashkon', 'loan_get')))
						->setPaper('A4')
						->setOrientation('landscape')
						->download('Pinjaman Dana Bulan '.$month.' Tahun '.$year.'.pdf');
	}

	public function saveCashin()
	{
		$title = "Konsolidasi - Cash In";
		$month = Input::get('month');
		$year = Input::get('year');

		$cashin = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->get();
	    $cashin_id = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
            ->lists('proyek_id');
        $noCashin = Proyek::whereNotIn('id', $cashin_id)->get();
	    $proyeksi = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
	            ->sum('proyeksi');
	    $jan = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 1 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $feb = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 2 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $mar = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 3 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $apr = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 4 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $mei = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 5 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $jun = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 6 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $jul = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 7 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $agt = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 8 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $sep = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 9 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $okt = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 10 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $nov = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 11 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    $des = Cashind::where(DB::raw('MONTH(tgl_cash_in)'), '=', 12 ) 
				->where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )			
	            ->sum('nilai_cash_in');
	    return PDF::loadHTML(View::make('print/savecashin', compact('month' , 'year', 'cashin', 'noCashin', 'proyeksi', 'title',
			'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des')))
						->setPaper('A4')
						->setOrientation('landscape')
						->download('Cash In Bulan '.$month.' Tahun '.$year.'.pdf');
		//return View::make('print/savecashin', compact('month' , 'year', 'cashin', 'noCashin', 'proyeksi', 'title',
			//'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agt', 'sep', 'okt', 'nov', 'des'));
	}

	public function saveCashout()
	{
		$title = "Konsolidasi - Cash Out";
		$month = Input::get('month');
		$year = Input::get('year');

	    //CASHOUT
		$cashout = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            ->get();
	    $cashout_id = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )
            ->lists('proyek_id');
        $noCashout = Proyek::whereNotIn('id', $cashout_id)->get();
		$proyeksi_proyek1 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_proyek');
	    $proyeksi_proyek2 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_departemen');
	    $proyeksi_proyek3 = Cashout::where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
	            			->sum('cash_fasilitas');
	    $proyeksi_proyek = $proyeksi_proyek1+$proyeksi_proyek2+$proyeksi_proyek3;
	    $jan_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$feb_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$mar_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$apr_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$mei_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$jun_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$jul_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$agt_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$sep_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$okt_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$nov_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');
		$des_proyek = Cashoutd::where(DB::raw('MONTH(tgl_cash_out)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cash_out)'), '=', $year )			
			            ->sum('nilai_cash_out');

		$jan_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$feb_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$mar_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$apr_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$mei_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$jun_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$jul_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$agt_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$sep_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$okt_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$nov_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');
		$des_divisi = Cashoutddiv::where(DB::raw('MONTH(tgl_cashout)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
			            ->sum('nilai_cashout');

		$ok_netto1 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('pemasaran');
        $ok_netto2 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('sekretariat');
        $ok_netto3 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('fasilitas');
        $ok_netto4 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('personalia');
        $ok_netto5 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('keuangan');
        $ok_netto6 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('kendaraan');
        $ok_netto7 = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )
            ->sum('umum');
        $ok_netto_divisi = $ok_netto1+$ok_netto2+$ok_netto3+$ok_netto4+$ok_netto5+$ok_netto6+$ok_netto7;
     
       	$awal = new dateTime($year."-01-01");
	    $akhir = new dateTime($year."-".$month."-28");
        $proyeksi_divisi = Cashoutddiv::whereBetween('tgl_cashout', [$awal, $akhir]) 
            ->sum('nilai_cashout');

	    $cashoutdiv = Cashoutdiv::where(DB::raw('YEAR(tgl_cashout)'), '=', $year )			
	            ->get();
	    return PDF::loadHTML(View::make('print/savecashout', compact('cashout', 'month', 'year', 'cashoutdiv', 'noCashout', 'proyeksi_proyek',
				    	'pemasaran', 'sekretariat', 'fasilitas', 'personalia', 'keuangan', 'kendaraan', 'umum',
						'jan_proyek', 'feb_proyek', 'mar_proyek', 'apr_proyek', 'mei_proyek', 'jun_proyek', 'ok_netto_divisi',
						'jul_proyek', 'agt_proyek', 'sep_proyek', 'okt_proyek', 'nov_proyek', 'des_proyek', 'proyeksi_divisi',
						'jan_divisi', 'feb_divisi', 'mar_divisi', 'apr_divisi', 'mei_divisi', 'jun_divisi', 
						'jul_divisi', 'agt_divisi', 'sep_divisi', 'okt_divisi', 'nov_divisi', 'des_divisi', 'title'
						)))
						->setPaper('A4')
						->setOrientation('landscape')
						->download('Cash Out Bulan '.$month.' Tahun '.$year.'.pdf');

	//	return View::make('print/savecashout', compact('cashout', 'month', 'year', 'cashoutdiv', 'noCashout', 'proyeksi_proyek',
	    //	'pemasaran', 'sekretariat', 'fasilitas', 'personalia', 'keuangan', 'kendaraan', 'umum',
		//	'jan_proyek', 'feb_proyek', 'mar_proyek', 'apr_proyek', 'mei_proyek', 'jun_proyek', 'ok_netto_divisi',
		//	'jul_proyek', 'agt_proyek', 'sep_proyek', 'okt_proyek', 'nov_proyek', 'des_proyek', 'proyeksi_divisi',
			//'jan_divisi', 'feb_divisi', 'mar_divisi', 'apr_divisi', 'mei_divisi', 'jun_divisi', 
		//	'jul_divisi', 'agt_divisi', 'sep_divisi', 'okt_divisi', 'nov_divisi', 'des_divisi', 'title'
		//	));
	}

	public function saveOmzet()
	{
		$title = "Konsolidasi - Omzet";
		$month = Input::get('month');
		$year = Input::get('year');
		$awal = new dateTime($year."-01-01");
		$akhir = new dateTime($year."-".$month."-28");
		$omzet_id = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', $month ) 
			->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )
            ->lists('proyek_id');
        $noOmzet = Proyek::whereNotIn('id', $omzet_id)->get();

		$rkap = Cashin::where(DB::raw('YEAR(tgl_cash_in)'), '=', $year )
					->sum('ok_netto');
        $jan_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 1 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$feb_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 2 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$mar_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 3 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$apr_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 4 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$mei_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 5 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$jun_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 6 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$jul_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 7 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$agt_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 8 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$sep_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 9 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$okt_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 10 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$nov_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 11 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$des_omzet = Omzetd::where(DB::raw('MONTH(tgl_omzet)'), '=', 12 ) 
						->where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		$total_omzet = Omzetd::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
						->sum('nilai_omzet');
		//OMZET
		$omzet = Omzet::where(DB::raw('YEAR(tgl_omzet)'), '=', $year )			
	            ->get();
	    return PDF::loadHTML(View::make('print/saveomzet', compact('omzet', 'year', 'month', 'rkap', 'noOmzet', 'title',
						'jan_omzet', 'feb_omzet', 'mar_omzet', 'apr_omzet', 'mei_omzet', 'jun_omzet', 'total_omzet',
						'jul_omzet', 'agt_omzet', 'sep_omzet', 'okt_omzet', 'nov_omzet', 'des_omzet')))
						->setPaper('A4')
						->setOrientation('landscape')
						->download('Omzet Bulan '.$month.' Tahun '.$year.'.pdf');
		//return View::make('print/saveomzet', compact('omzet', 'year', 'month', 'rkap', 'noOmzet', 'title',
			//'jan_omzet', 'feb_omzet', 'mar_omzet', 'apr_omzet', 'mei_omzet', 'jun_omzet', 'total_omzet',
			//'jul_omzet', 'agt_omzet', 'sep_omzet', 'okt_omzet', 'nov_omzet', 'des_omzet'));
	}

}
