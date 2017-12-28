@include('layout.header')
<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                {{--<div class="col-sm-8">--}}
                    {{--<h1 class="mainTitle">Starter Page</h1>--}}
                    {{--<span class="mainDescription">Use this page to start from scratch and put your custom content</span>--}}
                {{--</div>--}}
                <ol class="breadcrumb">
                    <li>
                        <span>Pages</span>
                    </li>
                    <li class="active">
                        <span>Blank Page</span>
                    </li>
                </ol>
            </div>
        </section>
        <section class="container-fluid container-fullw bg-white custom-top">
            <div class="row">
                <div class="col-sm-12">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: YOUR CONTENT HERE -->
        <!-- end: YOUR CONTENT HERE -->
    </div>
</div>


@include('layout.footer')
@yield('script')