@extends('mail.mail')
@section('content')
    Dear {{$name}},
    <br />
    <p>
        We want to inform you, that after trying to access website
    </p>
    <p style="text-align:center;">{{$data}}</p>
    <p>we got notified that</p>
    <br />
    <p style="text-align:center;"><strong style="color:#68221f;">SERVER IS DOWN</strong></p>
    <br />
@endsection
