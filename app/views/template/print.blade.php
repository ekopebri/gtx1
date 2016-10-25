<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title or 'no name' }}</title>
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/font-awesome/css/font-awesome.min.css')}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <!-- javascript -->
    <script src=""></script>
    {{HTML::script('assets/js/jquery.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
    {{HTML::script('assets/js/bootstrap-editable.min.js')}}
    {{HTML::script('assets/js/editable.js')}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>

            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('content')
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

    

</body>

</html>
