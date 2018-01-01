<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="index.html">
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
                <li>
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
                        <li>
                            <a href="{{ url('users') }}">
                                <span class="title">All Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('users/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{url('employee')}}">
                                <span class="title">All Developers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('employee/add')}}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{ url('clients') }}">
                                <span class="title">All Clients</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('clients/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{ url('skills') }}">
                                <span class="title">All Skills</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('skills/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{ url('projects') }}">
                                <span class="title">All Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('projects/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{ url('tasks') }}">
                                <span class="title">View All</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('tasks/add') }}">
                                <span class="title"> Add New </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{ url('leave') }}">
                                <span class="title">View All</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('leave/apply') }}">
                                <span class="title"> Apply Leave</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
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
                        <li>
                            <a href="{{url('salary/transactions')}}">
                                <span class="title">Salary Transactions </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('salary/new_transaction')}}">
                                <span class="title">New Transaction </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('salary/increment_due')}}">
                                <span class="title"> Employees Increment Due </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
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
                        <li>
                            <a href="ui_elements.html">
                                <span class="title"> Logo </span>
                            </a>
                        </li>
                     </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}"onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-na"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Logout </span>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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