<div class="row clearfix">
    <div class="card" style="background:#373b3e;">
        <h3 style="color:#fff;margin:0;padding:20px 0 0 30px;"><i class="fa fa-globe"></i> Website Availability</h3>
        <div class="row clearfix" style="padding:30px;padding-bottom:0;">
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-light">
                        <div class="icon"><i class="fa fa-globe"></i> </div>
                        <div class="content">
                            <div class="text">MONITORING</div>
                            <h5 class="number">{{$totalSites}} websites</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-success">
                        <div class="icon"><i class="icon-arrow-up"></i> </div>
                        <div class="content">
                            <div class="text">RUNNING</div>
                            <h5 class="number">{{$activeSites}} websites</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-danger">
                        <div class="icon"><i class="icon-arrow-down"></i> </div>
                        <div class="content">
                            <div class="text">OUT OF SERVICE</div>
                            <h5 class="number">{{$inactiveSites}} websites</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-warning">
                        <div class="icon"><i class="icon-control-pause"></i> </div>
                        <div class="content">
                            <div class="text">PAUSED MONITORING</div>
                            <h5 class="number">{{$pausedSites}} websites</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="color:#fff;margin:0;padding:0 0 0 30px;"><i class="fa fa-terminal"></i> Ping</h3>
        <div class="row clearfix" style="padding:30px;padding-bottom:0;">
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-light">
                        <div class="icon"><i class="fa fa-terminal"></i> </div>
                        <div class="content">
                            <div class="text">MONITORING</div>
                            <h5 class="number">{{$totalSites}} servers</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-success">
                        <div class="icon"><i class="icon-arrow-up"></i> </div>
                        <div class="content">
                            <div class="text">RUNNING</div>
                            <h5 class="number">{{$activeServers}} servers</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-danger">
                        <div class="icon"><i class="icon-arrow-down"></i> </div>
                        <div class="content">
                            <div class="text">OUT OF SERVICE</div>
                            <h5 class="number">{{$inactiveServers}} servers</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card top_counter">
                    <div class="body alert-warning">
                        <div class="icon"><i class="icon-control-pause"></i> </div>
                        <div class="content">
                            <div class="text">PAUSED MONITORING</div>
                            <h5 class="number">{{$pausedServers}} servers</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
