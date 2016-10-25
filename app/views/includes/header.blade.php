<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="/">RKD Online</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
<li>
    <a href="#"><i class="fa fa-user"></i>  {{ Auth::user()->name }}</a>
</li>
<li>
    <a href="{{ route('editpassword', Auth::user()->id) }}"><i class="fa fa-fw fa-gear"></i> Settings</a>
</li>
@if(Auth::user()->level == 'admin' || Auth::user()->level == 'superadmin')
<li>
    <a href="{{ URL::to('admin/history') }}"><i class="fa fa-fw fa-history"></i> History</a>
</li>
@endif
<li>
    <a href="{{ URL::to('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
</li>
</ul>