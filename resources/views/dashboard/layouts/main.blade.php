{{--main layout for custom dashboard--}}
@include('dashboard.layouts.head')

@include('dashboard.layouts.topnav')

<div class="content-wrapper">
    @include('dashboard.layouts.breadcrum')

    @yield('content')

</div>

@include('dashboard.layouts.bottom')
