<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Please Login</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/css/style.css')}}
    
    {{HTML::script('assets/js/jquery.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
	
</head>
<body>
	<section class="container login-form">
		<section>
			{{ Form::open(array('url' => 'login', 'role' => 'login')) }}
				<h1 class="page-header">RKD Online</h1>
				<div>
					{{ $errors->first('username') }}
					{{ $errors->first('password') }}
				</div>
				<div class="form-group">
					<input name="username" required class="form-control" placeholder="Enter username" />
					<span class="glyphicon glyphicon-user"></span>
				</div>
				
				<div class="form-group">
					<input type="password" name="password" required class="form-control" placeholder="Enter password" />
					<span class="glyphicon glyphicon-lock"></span>
				</div>
				
				<button type="submit" name="go" class="btn btn-primary btn-block">Login Now</button>
				RKDOnline &copy 2016
			</form>
		</section>
	</section>
	
</body>
</html>