<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home" style="font-weight: 500"> <span class="mif-widgets mif-lg mif-ani-pass mif-ani-slow"></span><span style="font-size:25px;font-style:italic;color:red">S</span>tocks Monitoring System</a>
         </div>
    {{--TOP MENU--}}
    @include('partials.nav_menu..top_menu')

    {{--SIDE BAR--}}
    @include('partials.nav_menu..sidebar')
    <!-- /.navbar-collapse -->
</nav>