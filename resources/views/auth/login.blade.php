@include('partials.prevent_caching')
<!DOCTYPE html>
<html>
<head>
    <title>Stocks Monitoring System  | Login</title>
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

<body style="background-image:url('{{ $project_name }}/public/images/bgg.jpg')">
<div class="container">
    <div class="row" style="margin-top:10%">
        <div class="col-lg-5 col-md-5 col-sm-5">
           <span class="mif-widgets mif-4x  mif-ani-pass mif-ani-slow"></span> {{--<h2><img class="img-responsive" src="{{ $project_name }}/public/images/2.jpg" width="30%">--}}
            {{--<h2><strong><span style="font-style:italic;color:red">S</span>tocks Monitoring System <span style="font-style:italic">v1</span> </strong></h2>--}}
            <img class="img-responsive" src="{{ $project_name }}/public/images/loginbg.png">
        </div>
        <div class="col-md-offset-2 col-lg-offset-md-2 col-md-5 col-lg-5 col-sm-5">
            <div class="block-shadow padding20">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <h3><i class="fa fa-cog fa-spin"></i> Login </h3>
                    <hr class="thin"/>
                    <br />
                    <div class="input-control {{ $errors->has('name')? ' info' : '' }} text full-size"  data-role="input">
                        <label for="email">User name :  @if ($errors->has('name')) <span style="color:#ff0000"> {{ $errors->first('name') }}</span> @endif </label>
                        <input type="text" name="name" id="name">
                        <button class="button helper-button clear"><span class="mif-cross"></span></button>
                    </div>
                    <br />
                    <br />
                    <div class="input-control password full-size{{ $errors->has('password') ? ' info' : '' }}" data-role="input">
                        <label for="password">User password:  @if ($errors->has('password')) <span style="color:#ff0000"> {{ $errors->first('password') }}</span> @endif </label>
                        <input type="password" name="password" id="password">
                        <button class="button helper-button reveal"><span class="mif-looks"></span></button>
                    </div>
                    <br />
                    <br />
                    <div class="form-actions">
                        <button type="submit" class="button primary block-shadow-info loading-pulse">Login</button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        <a class="btn btn-link" href="{{ url('/register/') }}">Create New</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.footer')
</div>    <!-- /.container -->

</div>

</body>
</html>
<script src="{{ $project_name }}/public/js/scripts.js"></script>
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
            type: 'alert',
            caption: '',
            content: "<center>Stocks Monitoring System.</center>"});
    }, 2000);

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

</script>


