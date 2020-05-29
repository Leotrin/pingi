@extends("layouts.app")

@section("content")
    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Websites</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Websites</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#newWebsiteMonitoring">
                            MONITOR NEW <i class="icon-globe"></i>
                        </button>
                    </div>
                </div>
            </div>
            @include('src.new-monitor')
            @if(isset($history))
                @include('src.history')
            @else
                @if(isset($result))
                    @include('src.search')
                @else
                    @include('src.websites-list')
                @endif
            @endif
        </div>
    </div>
@endsection
@section('footer')
    <script src="/frontend_assets/js/index.js"></script>
@endsection
