@extends("layouts.app")

@section("content")
    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Monitoring</small>
                                <h6 class="mb-0 mt-1"><i class="icon-globe"></i> {{$allSites}}</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#newWebsiteMonitoring">
                            MONITOR NEW <i class="icon-globe"></i>
                        </button>
                    </div>
                </div>
            </div>

            @include('src.new-monitor')
            @include('src.dashboard')

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    @include('src.events')
                </div>
                <div class="col-lg-4 col-md-5">
                    @include('src.overall')
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footer')
    <script src="/frontend_assets/js/index.js"></script>
@endsection
