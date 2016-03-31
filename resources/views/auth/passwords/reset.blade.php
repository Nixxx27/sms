
<!DOCTYPE html>
<html>
<head>
    <title>SkyLogistics Philippines Inc | Scheduling Management System</title>
    <link href="{{ $project_name }}/public{{ elixir('css/styles.css') }}" rel="stylesheet">

    <script src="public/_style/js/jquery-2.1.3.min.js"></script>
    <script src="public/_style/js/metro.js"></script>
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>

<body class="bg-darkTeal">
<div class="login-form padding20 block-shadow">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
        {!! csrf_field() !!}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-refresh"></i>Reset Password
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script>
    setTimeout(function(){
        $.Notify({
            type: 'success',
            caption: 'Good Day, Welcome! to',
            content: " "});
    }, 1000);

    setTimeout(function(){
        $.Notify({
            keepOpen: true,
            type: 'default',
            caption: "<img src='public/images/skylogo.png'>",
            content: " "});
    }, 2000);

    setTimeout(function(){
        $.Notify({
            keepOpen: true,
            type: 'alert',
            caption: '',
            content: "<center>Scheduling Management System.</center>"});
    }, 2500);

    setTimeout(function(){
        var d = new Date();
        var dateNow =  d.toDateString();
        $.Notify({
            type: 'warning',
            caption: "",
            content: "<center>" + dateNow + "</center>" });
    }, 3500);

    setTimeout(function(){
        var d = new Date();
        var dateNow =  d.toDateString();
        $.Notify({
            keepOpen:true,
            type: 'info',
            caption: "",
            content: "<center>" + dateNow + "</center>" });
    }, 6500);

    setTimeout(function(){
        $.Notify({
            keepOpen:true,
            type: 'warning',
            caption: "",
            content: "<p style='text-align:center'>S. M. S.</p>" });
    }, 6500);
</script>



