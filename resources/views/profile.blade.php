@extends("layouts.app")

@section("content")
    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2>Profile</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    <form action="/profile" method="post">
                        @csrf
                        <label>Full name</label>
                        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" />
                        <br />

                        <label>E-Mail</label>
                        <input type="email" name="email" value="{{auth()->user()->email}}" disabled class="form-control" />
                        <br />
                        <hr />
                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="body">
                    <form action="/update/password" method="post">
                        <h2>Change password</h2>
                        @csrf
                        <input type="hidden" name="email" value="{{auth()->user()->email}}" />
                        <label>Current password</label>
                        <input type="password" name="old_password" class="form-control" />
                        <br />
                        <label>New password</label>
                        <input type="password" name="password" class="form-control" />
                        <br />
                        <label>Confirm new password</label>
                        <input type="password" name="password_confirmation" class="form-control" />
                        <br />

                        <hr />
                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('footer')
    <script src="/frontend_assets/js/index.js"></script>
@endsection
