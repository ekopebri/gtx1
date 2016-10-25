<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title or 'no name' }}</title>
    {{HTML::style('assets/css/bootstrap-editable.min.css')}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/css/sb-admin.css')}}
    {{HTML::style('assets/font-awesome/css/font-awesome.min.css')}}
    

    <!-- javascript -->
    <script src=""></script>
    {{HTML::script('assets/js/jquery.js')}}
    {{HTML::script('assets/js/bootstrap.min.js')}}
    {{HTML::script('assets/js/bootstrap-editable.min.js')}}
    {{HTML::script('assets/js/editable.js')}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <style type="text/css">
        table{
            font-size: 10px;
            border: 1px solid black;
        }
        .rounded:link, .rounded:visited {
           border-radius: 100%;
           display: block;
           height: 200px;
           margin-bottom: 15px;
           overflow: hidden;
           width: 200px;
             }
        .img-1{
            width: 250px;
            height: 250px;
        }
       .navbar-inverse .navbar-nav>li>a {
    color: #FBFBFB;
}
     .top-nav>li>a {
    color: #FBFBFB;
}
    .navbar-inverse .navbar-brand {
    color: #FBFBFB;
}
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            @include('includes/header')
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @include('includes/sidebar')
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('content')
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

</body>

</html>
