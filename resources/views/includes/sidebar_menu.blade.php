<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse collapse in" area-expanded="false" style="height: 1px;">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{URL::route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @if(Auth::user()->hasManagingPermission())
            <li>
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::route('user.user-create-get')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i> Create user</a>
                        <a href="{{URL::route('user.user-list-get')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i> Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> News<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::route('get-news-list')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i> News</a>
                        <a href="{{URL::route('get-create-news-page')}}"><i class="fa fa-arrow-right" aria-hidden="true"></i> Create News</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>