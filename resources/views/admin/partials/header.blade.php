<header class="header fixed-top clearfix">
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="logo">
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>

    <div class="top-nav clearfix">
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    {!! HTML::image('assets-admin/images/no-avatar.png', 'no-avatar') !!}
                    <span class="username"> {{ trans('common.welcome', ['name' => auth()->guard()->user()->name]) }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> {{ trans('common.logout') }}</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
    </div>
</header>
