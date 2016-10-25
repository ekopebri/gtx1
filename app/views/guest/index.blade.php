@extends('template/master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		{{HTML::image('/assets/images/wikarkd.jpg','wika', array('width' => '180', 'height' => '100', 'align' => 'right'))}}
		<h1 class="page-header">
		Halaman
			<small>Divisi</small>
		</h1>			
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Halaman Utama
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		@if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
         @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
	</div>
</div>
<div class="row">
	@if(Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin')
	<div class="col-lg-4" align="center">
		<a class="rounded" title="Proyek" href="{{ URL::to('admin/proyek') }}"> 
			{{HTML::image('/assets/images/proyek.JPG','wika', array('class' => 'img-1'))}} 
		</a>
		<h2>Proyek</h2>
	</div>
	<div class="col-lg-4" align="center">
		<a class="rounded" title="Divisi" href="{{ URL::to('admin/divisi') }}"> 
			{{HTML::image('/assets/images/divisi.jpg','wika', array('class' => 'img-1'))}} 
		</a>
		<h2>Divisi</h2>
	</div>
	<div class="col-lg-4" align="center">
		<a class="rounded" title="Konsolidasi" href="{{ URL::to('admin/konsolidasi') }}"> 
			{{HTML::image('/assets/images/konsolidasi.jpg','wika', array('class' => 'img-1'))}} 
		</a>
		<h2>Konsolidasi</h2>
	</div>
	@else
	<div class="col-lg-12" align="center">
		<a class="rounded" title="Proyek" href="{{ URL::to('admin/proyek') }}"> 
			{{HTML::image('/assets/images/proyek.jpg','wika', array('class' => 'img-1'))}} 
		</a>
		<h2>Proyek</h2>
	</div>
	@endif
</div>
@stop