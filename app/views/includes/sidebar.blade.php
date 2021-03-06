<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="{{ URL::to('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="{{ URL::to('admin/proyek/') }}"><i class="fa fa-fw fa-table"></i> Proyek</a>
        </li>
        <li>
            <a href="{{ URL::to('admin/anggaran/') }}"><i class="fa fa-fw fa-table"></i> Anggaran Proyek</a>
        </li>
        @if(Auth::user()->level != 'user')
        <li>
            <a href="{{ URL::to('admin/divisi') }}"><i class="fa fa-fw fa-table"></i> Divisi</a>
        </li>
        <li>
            <a href="{{ URL::to('admin/konsolidasi') }}"><i class="fa fa-fw fa-table"></i> Konsolidasi</a>
        </li>
        <li>
            <a href="{{ URL::to('admin/proyek/home') }}"><i class="fa fa-fw fa-edit"></i> Proyek</a>
        </li>
        <li>
            <a href="{{ URL::to('admin/divisi/home') }}"><i class="fa fa-fw fa-edit"></i> Divisi</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Download File <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="{{ URL::to('admin/proyek/file') }}">Proyek</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/divisi/file') }}">Divisi</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</div>