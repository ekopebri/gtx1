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
                <i class="fa fa-file"></i> Selesai
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<button class="btn btn-default"><a href="/">Kembali</a></button>
	</div>
</div>
@stop

