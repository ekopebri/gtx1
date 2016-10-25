@extends('template/master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    {{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
    <h1 class="page-header">
      Halaman
      <small>Admin</small>
    </h1>
    <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Edit Password
            </li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
    @if(Session::has('pesan'))
      {{ Session::get('pesan') }}
    @endif
    <h1 class="sub-header">Edit Password</h1>
   		{{ Form::model($user, array('route' => array('updatepassword', $user->id), 'method' => 'PUT')) }}
      <div class="form-group">
			<label class="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<label class="">Confirm Password</label>
			<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
		</div>
            <button type="submit" class="btn btn-default">Save</button>
            {{Form::close()}}
</div>
</div>
@stop