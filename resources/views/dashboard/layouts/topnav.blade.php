<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="site-name-title navbar-brand" href="{{ url('/home') }}">Site Inspection</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">--}}
                {{--<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">--}}
                    {{--<i class="fa fa-fw fa-wrench"></i>--}}
                    {{--<span class="nav-link-text">Sites</span>--}}
                {{--</a>--}}
                {{--<ul class="sidenav-second-level collapse" id="collapseComponents1">--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('/site') }}">Show</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ url('/site/create') }}">Create</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3_1" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Works</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents3_1">
                    <li>
                        <a href="{{ url('/work') }}">show</a>
                    </li>
                    <li>
                        <a href="{{ url('/work/create') }}">Create</a>
                    </li>

                </ul>
            </li>



            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-ship"></i>
                    <span class="nav-link-text">Ports</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="{{ url('/port') }}">Show</a>
                    </li>

                    <li>
                    <a href="{{ url('/port/create') }}">Create</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file-text"></i>
                    <span class="nav-link-text">Report</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents2">
                    <li>
                        <a href="{{ url('/report') }}">Create</a>
                    </li>

                </ul>
            </li>



            @if(\Illuminate\Support\Facades\Auth::user()->role == 'superadmin')
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponentsuser" data-parent="#collapseComponentsuser  ">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Edit User</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponentsuser">
                    <li>
                        <a href="{{ url('/user') }}">Show</a>
                    </li>
                </ul>
            </li>
            @endif



        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link"
                   data-toggle=""
                   data-target=""
                   href="{{ url('/home') }}"
                >
                    <i class="fa fa-fw fa-user-circle"></i>{{ \Illuminate\Support\Facades\Auth::user()->name }}

                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin' || \Illuminate\Support\Facades\Auth::user()->role == 'superadmin')
            <li class="nav-item">
                <a class="nav-link"
                   data-toggle=""
                   data-target=""
                   href="{{ url('/home') }}"
                >
                    <i class="fa fa-fw fa-universal-access"></i>{{ \Illuminate\Support\Facades\Auth::user()->role }}

                </a>
            </li>
            @endif
             <li class="nav-item">
                {{--<a class="nav-link"--}}
                   {{--data-toggle=""--}}
                   {{--data-target=""--}}
                   {{--href="{{ url('/logout') }}"--}}
                {{--></a>--}}

                 <a class="nav-link"
                    data-toggle=""
                    data-target=""
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                     <i class="fa fa-fw fa-sign-out"></i>Logout</a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                 </form>
            </li>
        </ul>
    </div>
</nav>