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
        {{ Form::model($user, array('route' => array('updateuser', $user->id), 'method' => 'PUT')) }}
        <div class="form-group">
            <label class="">Nama</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label class="">Username</label>
            <input type="text" name="username" class="form-control" value="{{$user->username}}">
        </div>
        <div class="form-group">
            <label class="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label class="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label class="">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label class="">Status</label>
            <select class="form-control" name="level" selected="{{$user->level}}">
                <option value"superadmin">superadmin</option>
                <option value"admin">admin</option>
                <option value"user">user</option>
                <option value"guest">guest</option>
            </select>
        </div>
        <button class="btn btn-primary">Create User</button>
        {{Form::close()}}
    </div>
</div>
@stop