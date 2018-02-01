<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <ul class="main-navigation-menu">
                <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
                    <a href="{{ url('dashboard') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-home"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Dashboard </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="{{ (Request::is('users') || Request::is('users/add') ? 'active open' : '') }}">
                    <a href="{{ url('users') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-user"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Users </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('users') ? 'active' : '') }}">
                            <a href="{{ url('users') }}">
                                <span class="title">All Users</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('users/add') ? 'active' : '') }}">
                            <a href="{{ url('users/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('employee') || Request::is('employee/add') ? 'active open' : '') }}">
                    <a href="{{url('employee')}}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-user"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Developers </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('employee') ? 'active' : '') }}">
                            <a href="{{url('employee')}}">
                                <span class="title">All Developers</span>
                            </a>
                        </li>
                        <li class="{{(Request::is('employee/add') ? 'active ' : '') }}">
                            <a href="{{url('employee/add')}}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('clients') || Request::is('clients/add') ? 'active open' : '') }}">
                    <a href="{{ url('clients') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-user"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Clients </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('clients') ? 'active' : '') }}">
                            <a href="{{ url('clients') }}">
                                <span class="title">All Clients</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('clients/add') ? 'active' : '') }}">
                            <a href="{{ url('clients/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('skills') || Request::is('skills/add') ? 'active open' : '') }}">
                    <a href="{{ url('skills') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-user"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Skills </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('skills') ? 'active' : '') }}">
                            <a href="{{ url('skills') }}">
                                <span class="title">All Skills</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('skills/add') ? 'active' : '') }}">
                            <a href="{{ url('skills/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('projects') || Request::is('projects/add') ? 'active open' : '') }}">
                    <a href="{{ url('projects') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-menu-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Projects </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('projects')  ? 'active' : '') }}">
                            <a href="{{ url('projects') }}">
                                <span class="title">All Projects</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('projects/add')  ? 'active' : '') }}">
                            <a href="{{ url('projects/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('milestones') || Request::is('milestones/add') ? 'active open' : '') }}">
                    <a href="{{ url('milestones') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-menu-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Milestones </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('milestones')  ? 'active' : '') }}">
                            <a href="{{ url('milestones') }}">
                                <span class="title">All Milestones</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('milestones/add')  ? 'active' : '') }}">
                            <a href="{{ url('milestones/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('tasks') || Request::is('tasks/add') ? 'active open' : '') }}">
                    <a href="{{ url('tasks') }}">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-pencil-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Tasks </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('tasks')? 'active' : '') }}">
                            <a href="{{ url('tasks') }}">
                                <span class="title">View All</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('tasks/add')? 'active' : '') }}">
                            <a href="{{ url('tasks/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('leave') || Request::is('leave/apply') ? 'active open' : '') }}">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-marker-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Leave </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('leave') ? 'active open' : '') }}">
                            <a href="{{ url('leave') }}">
                                <span class="title">View All</span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('leave/apply') ? 'active' : '') }}">
                            <a href="{{ url('leave/apply') }}">
                                <span class="title"> Apply Leave</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (Request::is('salary/transactions') || Request::is('salary/new_transaction') || Request::is('salary/increment_due') ? 'active open' : '') }}">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-money"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Salary </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('salary/transactions') ? 'active' : '') }}">
                            <a href="{{url('salary/transactions')}}">
                                <span class="title">Salary Transactions </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('salary/new_transaction') ? 'active' : '') }}">
                            <a href="{{url('salary/new_transaction')}}">
                                <span class="title">New Transaction </span>
                            </a>
                        </li>
                        <li class="{{ (Request::is('salary/increment_due') ? 'active' : '') }}">
                            <a href="{{url('salary/increment_due')}}">
                                <span class="title"> Employees Increment Due </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ (Request::is('settings/logo') ? 'active open' : '') }}">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-settings"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Settings </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (Request::is('settings/logo') || Request::is('settings/logo') ? 'active' : '') }}">
                            <a href="{{url('settings/logo')}}">
                                <span class="title"> Logo </span>
                            </a>
                        </li>
                     </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form-sidebar').submit();">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-na"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Logout </span>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                 </li>
            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
            <!-- start: CORE FEATURES -->
            {{--<div class="navbar-title">--}}
                {{--<span>Core Features</span>--}}
            {{--</div>--}}
            {{--<ul class="folders">--}}
                {{--<li>--}}
                    {{--<a href="pages_calendar.html">--}}
                        {{--<div class="item-content">--}}
                            {{--<div class="item-media">--}}
                                {{--<span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>--}}
                            {{--</div>--}}
                            {{--<div class="item-inner">--}}
                                {{--<span class="title"> Calendar </span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="pages_messages.html">--}}
                        {{--<div class="item-content">--}}
                            {{--<div class="item-media">--}}
                                {{--<span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i> </span>--}}
                            {{--</div>--}}
                            {{--<div class="item-inner">--}}
                                {{--<span class="title"> Messages </span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            <!-- end: CORE FEATURES -->
            <!-- start: DOCUMENTATION BUTTON -->
            {{--<div class="wrapper">--}}
                {{--<a href="documentation.html" class="button-o">--}}
                    {{--<i class="ti-help"></i>--}}
                    {{--<span>Documentation</span>--}}
                {{--</a>--}}
            {{--</div>--}}
            <!-- end: DOCUMENTATION BUTTON -->
        </nav>
    </div>
</div>
<!-- / sidebar -->