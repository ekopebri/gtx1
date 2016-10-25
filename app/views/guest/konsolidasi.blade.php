@extends('template/master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		{{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
		<h1 class="page-header">
			Halaman
			<small>Konsolidasi</small>
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Konsolidasi
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
		{{ Form::open(array('action' => 'KonsolidasiController@termin')) }}
		    <div class="form-group">
		        {{ Form::label('bulan', 'Bulan') }}
		        {{ Form::selectMonth('month', 1,['class' => 'form-control']) }}
		    </div>
		    <div class="form-group">
		        {{ Form::label('tahun', 'Tahun') }}
				{{ Form::selectRange('year', 2012, 2017, 2015,['class' => 'form-control']); }}
		    </div>
		    <button class="btn btn-primary">
				Search
			</button>
		{{ Form::close()}}
	</div>
	<div class="col-lg-3"></div>
</div>
@stop
