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
                    <th></th>
                    <th>Time</th>
                    <th>Performance</th>
                    <th>Response</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->sites as $site)
                    <tr>
                        <td><i class="icon-globe"></i></td>
                        <td>{{$site->url}}</td>
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
                        <td>
                            <form action="/website/check" method="post">
                                @csrf
                                <input type="hidden" value="{{$site->id}}" name="id" />
                                <button class="btn btn-info btn-sm">
                                    <i class="icon-reload"></i> Check
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
