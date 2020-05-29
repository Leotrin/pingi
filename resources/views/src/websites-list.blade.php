@php $pathUrl = Request::path(); @endphp
<style>
    .hideElement {
        display: none;
    }
</style>
<div class="card">
    <div class="header">
        <h2>Performance</h2>
    </div>
    <div class="body">

        @if(strpos($pathUrl,'web-traceroute')!==false)
            <div class="row">
                <div class="col-4 offset-4 text-center">
                    <form action="/website/traceroute" method="post" id="tracerouteForm">
                        @csrf
                        <label>Website</label>
                        <select name="website" class="form-control"  id="tracerouteSelect">
                            @foreach(auth()->user()->sites as $site)
                                <option value="{{$site->id}}">{{$site->url}}</option>
                            @endforeach
                        </select>
                        <br />
                        <br />
                        <button class="btn btn-primary" type="submit" id="tracerouteButton" onclick="tracerouteClicked()">Traceroute domain</button>
                    </form>
                </div>
                <div class="col-12">
                    <img src="/web/lazyload.gif" style="width:100%;" id="gifLoader" class="hideElement" />
                </div>
            </div>
        @else

            <div class="table-responsive">
                <table class="table table-hover m-b-0">
                    <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Website</th>
                        <th>Last Check</th>
                        <th>Performance</th>
                        <th>Response</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->sites as $site)
                        <tr>
                            <td style="width:120px;">
                                @if($site->status==3)
                                    <form action="/website/start" method="post" style="float:left;margin-right:5px;">
                                        @csrf
                                        <input type="hidden" value="{{$site->id}}" name="id" />
                                        <button class="btn btn-success btn-sm">
                                            <i class="icon-control-play"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="/website/pause" method="post" style="float:left;margin-right:5px;">
                                        @csrf
                                        <input type="hidden" value="{{$site->id}}" name="id" />
                                        <button class="btn btn-info btn-sm">
                                            <i class="icon-control-pause"></i>
                                        </button>
                                    </form>
                                @endif
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$site->id}}">
                                    <i class="icon-pencil"></i>
                                </button>
                                <div class="modal fade" id="edit{{$site->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="title" id="defaultModalLabel">Update website monitoring</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/website/update" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$site->id}}" name="id" />
                                                    <label>Url</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm"><small>https://</small></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="url" placeholder="google.com" aria-label="url"
                                                               value="{{$site->url}}"
                                                               aria-describedby="inputGroup-sizing-sm">
                                                    </div>
                                                    <label>Refresh Rate</label>
                                                    <select class="form-control" name="refresh">
                                                        <option value="10" @if($site->refresh_rate==10) selected @endif>10 minutes</option>
                                                        <option value="15" @if($site->refresh_rate==15) selected @endif>15 minutes</option>
                                                        <option value="30" @if($site->refresh_rate==30) selected @endif>30 minutes</option>
                                                        <option value="60" @if($site->refresh_rate==60) selected @endif>60 minutes</option>
                                                        <option value="360" @if($site->refresh_rate==360) selected @endif>6 hours</option>
                                                        <option value="720" @if($site->refresh_rate==720) selected @endif>12 hours</option>
                                                        <option value="1440" @if($site->refresh_rate==1440) selected @endif>24 hours</option>
                                                    </select>
                                                    <br />
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                                                        <button type="submit" class="btn btn-primary">SAVE & MONITOR</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$site->id}}">
                                    <i class="icon-trash"></i>
                                </button>
                                <div class="modal fade" id="delete{{$site->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="title" id="defaultModalLabel">Remove website monitoring</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/website/destroy" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$site->id}}" name="id" />
                                                    <h3 class="text-center">Are you sure?</h3>
                                                    <br />
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No, close it</button>
                                                        <button type="submit" class="btn btn-primary">Yes, Remove it</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><i class="icon-globe"></i> {{$site->url}}</td>
                            <td>
                                @if($site->last_check != null)
                                    <span>{{date('d.m.Y H:i',strtotime($site->last_check))}}</span>
                                @endif
                            </td>
                            <td>
                                @if($site->status==1)
                                    <span class="badge badge-success"><i class="fa fa-terminal"></i> UP</span>
                                @elseif($site->status==2)
                                    <span class="badge badge-danger"><i class="fa fa-terminal"></i> Down</span>
                                @endif
                                @if($site->site_available==1)
                                    <span class="badge badge-success"><i class="fa fa-globe"></i> Running</span>
                                @elseif($site->site_available==2)
                                    <span class="badge badge-danger"><i class="fa fa-globe"></i> Down</span>
                                @endif
                            </td>
                            <td>
                                @if($site->avg == -1)
                                    <span class="badge badge-danger">Time out</span>
                                @elseif($site->avg!=0)
                                    <span>{!! $site->avg !!}ms</span>
                                @endif
                            </td>
                            <td class="text-right">
                                @if(strpos($pathUrl,'web-ping')!==false)
                                <form action="/website/ping" method="post" style="float:right;">
                                    @csrf
                                    <input type="hidden" value="{{$site->id}}" name="id" />
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-terminal"></i>
                                    </button>
                                </form>
                                @endif
                                @if(strpos($pathUrl,'website')!==false)
                                    <form action="/website/check" method="post" style="float:right;margin-right:5px;">
                                        @csrf
                                        <input type="hidden" value="{{$site->id}}" name="id" />
                                        <button class="btn btn-info btn-sm">
                                            <i class="icon-reload"></i>
                                        </button>
                                    </form>
                                @endif

                                <a href="/website/history/{{$site->id}}" class="btn btn-success btn-sm" style="margin-right:5px;">
                                    <i class="fa fa-history"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>
</div>
<script>
    function tracerouteClicked(){
        $('#tracerouteForm').submit();
        $('#tracerouteForm').addClass('hideElement');
        $('#gifLoader').removeClass('hideElement');
        // $('#tracerouteSelect').prop('disabled',true);
        // $('#tracerouteButton').prop('disabled',true);
    }
</script>
