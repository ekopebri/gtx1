@extends('template/admin')
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
                <i class="fa fa-file"></i> Manajemen User
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1>Manajemen User</h1>
		@if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
		<a class="btn btn-default" href="{{ URL::to('adsss/register') }}">Tambah user</a>
		<table class="table table-striped table-bordered">
		<tr style="font-weight:bold; text-align:center;">
			<td>No</td>
			<td>Nama</td>
			<td>Username</td>
			<td>Email</td>
			<td>level</td>
			<td>Proyek ID</td>
			<td></td>
		</tr>
		<?php $i = 0; ?>
		@foreach($user as $data)
		<tr>
			<?php $i++; ?>
			<td>{{$i}}</td>
			<td>{{$data->name}}</td>
			<td>{{$data->username}}</td>
			<td>{{$data->email}}</td>
			<td>{{$data->level}}</td>
			<td>      
				<?php
				if ($data->level == 'user') {
					$exist = Proyek::where('user_id', $data->id)
							->pluck('id');
					if (is_numeric($exist)) {
					$proyek = Proyek::where('user_id', $data->id)
							->pluck('id');				
					echo $proyek;
					} else {
					echo 0;
					}
				}
				
				?>
			</td>
			<td>
				<a href="{{ route('edituserproyek', $data->id) }}"><span class="fa fa-edit"></span> Edit Proyek</a>
				<a href="{{ route('edituser', $data->id) }}"><span class="fa fa-fw fa-edit"></span> Edit USer</a>
				<a href="{{ route('deluser', $data->id) }}"><span class="fa fa-trash"></span> Delete</a>
			</td>
		</tr>
		@endforeach
		</table>
	</div>
	<div align="center">
	{{$user->links()}}
	</div>
</div>
@stop