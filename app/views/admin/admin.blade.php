@if(!Auth::check())
	{{return redirect('admin')}}
@else
	{{var_dump('logged in')}}
	{{Form::url('admin/logout', 'Logout')}}

@endif
