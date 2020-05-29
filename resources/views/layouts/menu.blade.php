
<div class="main_menu">
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            @php $pathUrl = Request::path(); @endphp
            <div class="navbar-collapse align-items-center collapse" id="navbar">
                <ul class="navbar-nav">

                    <li class="nav-item @if($pathUrl=='home') active @endif "><a href="{{url('/home')}}" class="nav-link"><i class="icon-speedometer"></i> <span> Dashboard</span></a></li>
                    <li class="nav-item @if(strpos($pathUrl,'website')!==false) active @endif "><a href="{{url('/website')}}" class="nav-link"><i class="icon-globe"></i> <span> Websites</span></a></li>
                    <li class="nav-item @if(strpos($pathUrl,'web-ping')!==false) active @endif "><a href="{{url('/web-ping')}}" class="nav-link"><i class="fa fa-terminal"></i> <span> Ping</span></a></li>
                    <li class="nav-item @if(strpos($pathUrl,'web-traceroute')!==false) active @endif "><a href="{{url('/web-traceroute')}}" class="nav-link"><i class="fa fa-code-fork"></i> <span> Trace Route</span></a></li>
                </ul>
            </div>

        </div>
    </nav>
</div>

