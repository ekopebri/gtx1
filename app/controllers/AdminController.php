<?php


class AdminController extends \BaseController {

	
	public function showProyek()
	{
		$title = 'Home Proyek';
		$proyek = Proyek::paginate(10);
		return View::make('proyek.index', compact('proyek', 'title'));
	}

	public function createProyek()
	{
		$title = 'Tambah Proyek';
		return View::make('proyek/create', compact('title'));
	}

	public function storeProyek()
	{
		$input = Input::all();

		$aturan = array(
			'spk' => 'required', 
			'nama' => 'required', 
			'tgl_proyek' => 'required',
			'tgl_akhir' => 'required' 
		);

		$pesan = array(
			'spk.required' => 'Inputan kode SPK wajib diisi.',
			'nm_proyek.require' => 'Inputan Nama Proyek Wajib diisi',
			'tgl_proyek.required' => 'Inputan Tanggal Awal Proyek Wajib diisi',
			'tgl_proyek.date' => 'Inputan Tanggal harus berupa tanggal.',
			'tgl_akhir.date' => 'Inputan Tanggal Akhir harus berupa tanggal.',
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {
			return Redirect::back()->withErrors($validasi)->withInput();
		} else {
			$data = new Proyek;
			$data->spk = Input::get('spk');
			$data->nm_proyek = Input::get('nama');
			$data->tgl_proyek = Input::get('tgl_proyek');
			$data->tgl_akhir = Input::get('tgl_akhir');
			$data->jenis_proyek = Input::get('jenis_proyek');
			$data->type_proyek = Input::get('type_proyek');
			$data->save();

			return Redirect::route('homeproyek')->withPesan('Proyek baru berhasil ditambahkan.');
		}
	}

	public function readProyek($id)
	{
		$proyek = Proyek::find($id);
		$title = 'Proyek '.$proyek->nm_proyek;
		return View::make('proyek/read', compact('proyek', 'title'));
	}
	public function editProyek($id)
	{
		$proyek = Proyek::find($id);
		$title = 'Proyek'.$proyek->nm_proyek;
		return View::make('proyek/edit', compact('proyek', 'title'));
	}

	public function updateProyek($id)
	{
		$input = Input::all();

		$aturan = array(
			'spk' => 'required', 
			'nama' => 'required', 
			'tgl_proyek' => 'required',
			'tgl_akhir' => 'required' 
		);

		$pesan = array(
			'spk.required' => 'Inputan kode SPK wajib diisi.',
			'nm_proyek.require' => 'Inputan Nama Proyek Wajib diisi',
			'tgl_proyek.required' => 'Inputan Tanggal Awal Proyek Wajib diisi',
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {
			return Redirect::back()->withErrors($validasi)->withInput();
		} else {
			$data = Proyek::find($id);

			$data->spk = Input::get('spk');
			$data->nm_proyek = Input::get('nama');
			$data->tgl_proyek = Input::get('tgl_proyek');
			$data->tgl_akhir = Input::get('tgl_akhir');
			$data->jenis_proyek = Input::get('jenis_proyek');
			$data->type_proyek = Input::get('type_proyek');
			$data->save();

			return Redirect::route('homeproyek')->withPesan('Proyek baru berhasil ditambahkan.');
		}
	}

	public function delProyek($id)
	{
		Proyek::find($id)->delete();
		return Redirect::back()->withPesan('Proyek berhasil dihapus.');	
	}

	public function history()
	{
		$title = 'Admin - History';
		$history = History::orderBy('created_at', 'DESC')->paginate(10);
		
		return View::make('divisi/history', compact('title', 'history'));
	}

	public function showDivisi()
	{
		$title = 'Divisi';
		$divisi = Div::paginate(10);
		return View::make('divisi/index', compact('divisi', 'title'));
	}

	public function createDivisi()
	{
		$title = 'Create Divisi';
		return View::make('divisi/create', compact('title'));	
	}

	public function storeDivisi()
	{
		$input = Input::all();
		
		$aturan = array(
			'spk' => 'required', 
			'nama' => 'required', 
			'wilayah' => 'required', 
		);

		$pesan = array(
			'nama.required' => 'Inputan Nama Divisi wajib diisi.',
			'spk.required' => 'Inputan Nomor SPK wajib diisi.',
			'wilayah.required' => 'Inputan Wilayah Kerja wajib diisi.',
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {

			return Redirect::back()->withErrors($validasi)->withInput();

		} else {
			$item = new Div;
			$item->spk = Input::get('spk');
			$item->nm_divisi = Input::get('nama');
			$item->wilayah = Input::get('wilayah');
			$item->save();

			# Kehalaman beranda dengan pesan sukses
			return Redirect::route('homedivisi')->withPesan('Divisi baru berhasil ditambahkan.');
		}
	}

	public function readDivisi($id)
	{
		$div = Div::find($id);
		$title = 'Divisi '.$div->nm_divisi;
		return View::make('divisi/read', compact('div', 'title'));
	}

	public function updateDivisi($id)
	{
		$input = Input::all();

		$aturan = array(
			'nama' => 'required', 
			'spk' => 'required', 
			'wilayah' => 'required', 
		);

		$pesan = array(
			'nama.required' => 'Inputan Nama wajib diisi.',
			'spk.required' => 'Inputan SPK wajib diisi.',
			'wilayah.required' => 'Inputan Wilayah wajib diisi.',
		);

		$validasi = Validator::make($input, $aturan, $pesan);

		if($validasi->fails()) {

			return Redirect::back()->withErrors($validasi)->withInput();

		} else {

			$ganti = Div::find($id);

			$ganti->spk			= Input::get('spk');
			$ganti->nm_divisi 			= Input::get('nama');
			$ganti->wilayah 	= Input::get('wilayah');
			$ganti->save();

			return Redirect::route('homedivisi')->withPesan('Divisi berhasil di update');
		}
	}

	public function editDivisi($id)
	{
		$div = Div::find($id);
		$title = 'Edit Divisi '.$div->nm_divisi;
		return View::make('divisi/edit', compact('div', 'title'));
	}

	public function delDivisi($id)
	{
		Div::find($id)->delete();
		return Redirect::back()->withPesan('Divisi berhasil dihapus.');
	}
}
