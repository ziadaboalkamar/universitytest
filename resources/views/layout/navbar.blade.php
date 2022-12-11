<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                                                                                   data-feather="menu"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">


            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="javascript:void(0);"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ Auth::user()->name ?? '' }}</span>
                        <span class="user-status"></span>
                    </div>
                    <span class="avatar"><img
                            class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg"
                            alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    {{--                    <a--}}
                    {{--                        class="dropdown-item" href="{{route('admins.profile.index')}}"><i class="mr-50" data-feather="user"></i>--}}
                    {{--                        الملف الشخصي</a>--}}

                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">
                        <i class="mr-50" data-feather="power"></i>Logout</a>

                    <form action="{{ route('logout') }}" method="post" class="d-none" id="logout">
                        @csrf
                        <button type="submit"></button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- END: Header-->
