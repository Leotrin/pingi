<!Doctype>
<html>
    <head>
        <title>pingi.io</title>
    </head>
    <body>
        <div style="background:#edf2f7;padding:20px;text-align:center;">
            <table style="max-width:700px;margin:auto;">
                <tr>
                    <td style="text-align:center;padding:15px;">
                        <img src="{{url('/assets/image/logo.png')}}" style="height:60px;margin-auto;"/>
                        <br />
                        <h3>pingi.io</h3>
                    </td>
                </tr>
                <tr>
                    <td style="background: #ffffff;padding: 15px;text-align:left;color:#383838 !important;">
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;padding:10px;">
                        <small>pingi.io &copy; 2020. All rights reserved </small>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
