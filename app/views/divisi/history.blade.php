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
                <i class="fa fa-file"></i> Manajemen User
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1>History Termin</h1>
		<table class="table table-striped table-bordered">
		<tr style="font-weight:bold; text-align:center;">
			<td>No</td>
			<td>user</td>
			<td>Kolom</td>
			<td>Sebelumnya</td>
			<td>Sesudahnya</td>
			<td>Tanggal</td>
		</tr>
		<?php $i = 0; ?>
		@foreach($history as $data)
		<tr>
			<?php $i++; ?>
			<td>{{$i}}</td>
			<td>
				<?php
					$id = $data->user_id;
					$nama = User::where('id', '=', $id)
							->pluck('name');
					echo $nama;
				?> 
			</td>
			<td>{{$data->column}}</td>
			<td>{{$data->before}}</td>
			<td>{{$data->after}}</td>
			<td>{{$data->updated_at}}</td>
		</tr>
		@endforeach
		</table>
	</div>
	<div align="center">
		{{$history->links()}}
	</div>
</div>
@stop