<?php


class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showLogin()
	{
		if (Auth::check()) {
			return Redirect::intended('/');
		} else {
			return View::make('guest/login');
		}
	}

	public function doLogin()
	{
		$rules = array(
			'username'	=>	'required',
			'password'	=>	'required|min:5'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) 
				->withInput(Input::except('password'));
		} else {
			$userdata = array(
				'username'	=>	Input::get('username'),
				'password'	=>	Input::get('password')
			);

		    if (Auth::attempt($userdata))
		    {
		        // Simpan Session ID
		        $user = Auth::user();
		        $user->session_id = Auth::getSession()->getId();
		        $user->save();
		        
		        return Redirect::intended('/');
		    }

		    return Redirect::back()->withInput();
			}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function editPassword($id)
	{
		$user = User::find($id);
		$title = 'Edit User';
		return View::make('admin/editpass', compact('user', 'title'));
	}

	public function updatePassword($id)
	{
		$rules = array(
		    'password'=>'required|confirmed',
		    'password_confirmation'=>'required'
		    );

		$validator = Validator::make(Input::all(), $rules);
 
	    if ($validator->passes()) {
	        $user = User::find($id);
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

 		   return Redirect::to('/')->with('message', 'Password berhasil diubah');
	    } else {
	        return Redirect::to('/')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();    
	    }
	}

}
