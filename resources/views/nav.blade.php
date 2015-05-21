<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">{{trans('nav.title')}}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{url('auth/logout')}}"><i class="fa fa-sign-out fa-fw"></i> {{trans('nav.logout')}}</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li {{Session::get('currentPage') == 'spares' ? 'active' : ''}}>
                    <a href="{{url('spares')}}">{{trans('nav.spares')}}</a>
                </li>
                <li {{Session::get('currentPage') == 'categories' ? 'active' : ''}}>
                    <a href="{{url('categories')}}">{{trans('nav.categories')}}</a>
                </li>
                <li {{Session::get('currentPage') == 'users' ? 'active' : ''}}>
                   <a href="{{url('users')}}">{{trans('nav.users')}}</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>