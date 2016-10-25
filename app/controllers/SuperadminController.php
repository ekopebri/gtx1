<?php

class SuperadminController extends \BaseController {

	public function index()
	{
		$user = User::paginate(10);

		return View::make('admin/index', array('user' => $user));
	}

	public function history()
	{
		$history = History::paginate(50);

		return View::make('admin/history', array('history' => $history));
	}

	public function register()
	{
		return View::make('admin/create');
	}

	public function delUser($id)
	{
		User::find($id)->delete();
		return Redirect::back()->with('message', 'User account delete sucesfully!');
	}

	public function editUser($id)
	{
		$user = User::find($id);
		return View::make('admin/edit', compact('user'));
	}

	public function updateUser($id)
	{
		$rules = User::$rules;
		$rules['username'] = $rules['username'].','.$id;
		$rules['email'] = $rules['email'].','.$id;

		$validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
	        $user = User::find($id);
		    $user->name = Input::get('name');
		    $user->username = Input::get('username');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->level = Input::get('level');
		    $user->save();

 		   return Redirect::to('adsss')->with('message', 'Thanks for updating!');
	    } else {
	        return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
	    }
	}

	public function storeRegister()
	{
		$validator = Validator::make(Input::all(), User::$rules);
 
	    if ($validator->passes()) {
	        $user = new User;
		    $user->name = Input::get('name');
		    $user->username = Input::get('username');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->level = Input::get('level');
		    $user->save();

 		   return Redirect::to('adsss')->with('message', 'Thanks for registering!');
	    } else {
	        return Redirect::to('adsss/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
	    }
	}
	
	public function updateProyek()
    {
        $inputs = Input::all();
        if ($inputs['value'] == null) {
              	$value = 0;
            } else {
            	$value = $inputs['value'];
            }      
        $item = Proyek::find($inputs['pk']);
        $item->$inputs['name'] = $value;
        $item->save();
    }


	public function editUserproyek($id)
	{
		$title = 'Update Proyek User';
		$user = User::find($id);
		$spk = Proyek::lists('spk', 'id');
		return View::make('admin/proyek/edit', compact('user', 'spk', 'title'));
	}

	public function updateUserproyek($id)
	{
		$inputs = Input::all();
		$id = Input::get('spk');
	    $proyek = Proyek::find($id);
		$proyek->user_id = $inputs['id'];
		$proyek->save();

 		return Redirect::to('adsss')->with('message', 'Thanks for updating!');
	}

}
