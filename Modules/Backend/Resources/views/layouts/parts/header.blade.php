<header class="main-header">
    <a href="#" class="logo">
        <span class="logo-mini"><b>{{Lang::get('backend::core.little_title')}}</b></span>
        <span class="logo-lg"><b>{{Lang::get('backend::core.title')}}</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{Lang::get('backend::core.navigation.toogle')}}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">{{Lang::get('auth.links.my_account')}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{Lang::get('auth.logout.title')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>