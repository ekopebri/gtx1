@extends('template/master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		{{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
		<h1 class="page-header">
			Halaman
			<small>Proyek</small>
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Anggaran Proyek
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		@if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
		{{ Form::open(array('action' => 'AnggaranController@pilihAction')) }}
			<div class="form-group">
		        {{ Form::label('nospk', 'Nomor SPK') }}
		        {{ Form::select('spk', $spk, 1,['class' => 'form-control'])}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('tahun', 'Tahun') }}
				{{ Form::selectRange('year', 2012, 2017, 2015,['class' => 'form-control']); }}
		    </div>
		    <div class="form-group">
            <label class="">Status</label>
            <select class="form-control" name="pilihan">
                <option value"cashin">Cash In</option>
                <option value"cashout">Cash Out</option>
                <option value"omzet">Omzet</option>
            </select>
        </div>
		    <button class="btn btn-primary">
				Search
			</button>
		{{ Form::close()}}
	<div class="col-lg-3"></div>
	</div>
</div>
@stop