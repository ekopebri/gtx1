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
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
        {{ Form::model($user, array('route' => array('updateuserproyek', $user->id), 'method' => 'PUT')) }}
        <div class="form-group">
            <label class="">Nama</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}" disabled="disabled">
        </div>
        <div class="form-group">
            <label class="">Username</label>
            <input type="text" name="username" class="form-control" value="{{$user->username}}" disabled="disabled">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
        </div>
        <div class="form-group">
		        {{ Form::label('nospk', 'Nomor SPK') }}
		        {{ Form::select('spk', $spk, 1,['class' => 'form-control'])}}
		    </div>
        <button class="btn btn-primary">Ciptakan Account Proyek</button>
        {{Form::close()}}
    </div>
</div>
@stop