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
                <i class="fa fa-file"></i> Selesai
            </li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- uploaded -->
        @if (Session::has('done'))
            @foreach (Session::get('done') as $yes)
                <li>{{ $yes }}</li>
            @endforeach
            <p style="color: #2ecc71">Uploaded</p>
            <br>
        @endif

        <!-- not uploaded -->
        @if (Session::has('not'))
            @foreach (Session::get('not') as $no)
                <li>{{ $no }}</li>
            @endforeach
            <p style="color: #c0392b">wasnt uploaded</p>
            <br>
        @endif
		<button class="btn btn-default"><a href="/">Kembali</a></button>
	</div>
</div>
@stop

