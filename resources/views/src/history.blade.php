<div class="card">
    <div class="header">
        <h2>Performance</h2>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="table table-hover m-b-0">
                <thead class="thead-dark">
                <tr>
                    <th>Website</th>
                    <th>Type</th>
                    <th>Date & Time</th>
                    <th>Performance</th>
                    <th>Response</th>
                </tr>
                </thead>
                <tbody>
                @foreach($history as $site)
                    <tr>
                        <td><i class="icon-globe"></i> {{$site->website->url}}</td>
                        <td>
                            @if($site->type=='ping')
                                <span class="badge badge-info">Ping</span>
                            @elseif($site->type=='site_available')
                                <span class="badge badge-primary">Site Availability</span>
                            @elseif($site->type=='traceroute')
                                <span class="badge badge-success">Traceroute</span>
                            @endif
                        </td>
                        <td>
                            <span>{{date('d.m.Y H:i',strtotime($site->created_at))}}</span>
                        </td>
                        <td>
                            @if($site->status==1)
                                <span class="badge badge-success">UP</span>
                            @elseif($site->status==2)
                                <span class="badge badge-danger">Down</span>
                            @endif
                        </td>
                        <td>
                            @if($site->avg!=0)
                                <span class="">
                                    {!! $site->avg !!}ms
                                </span>
                            @elseif($site->avg == -1)
                                <span class="badge badge-danger">Time out</span>
                            @endif
                            @if($site->response)

                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#traceroute{{$site->id}}">
                                        <i class="fa fa-code-fork"></i>
                                    </button>
                                    <div class="modal fade" id="traceroute{{$site->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="title" id="defaultModalLabel">{{$site->url}} Tracerooute</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @php
                                                        $routes = json_decode($site->response, true);
                                                    @endphp
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            @foreach($routes as $r)
                                                                @if($r!=null)
                                                                <tr>
                                                                    <td>{{$r}}</td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $history->links() }}
        </div>
    </div>
</div>
