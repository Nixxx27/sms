@include('partials.prevent_caching')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{  $project_title }} @yield('page_title')</title>
    <script src="{{ $project_name }}/public/_style/js/jquery-2.1.3.min.js"></script>
    <link href="{{ $project_name }}/public{{ elixir('css/styles.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
<div id="wrapper">
    @include('partials.nav_menu.nav')

    <div id="page-wrapper">
        <div class="container-fluid">

            @yield('content')
        @include('partials.footer')
        </div><!-- /.container-fluid -->

    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->

</body>

</html>
<script src="{{ $project_name }}/public/js/scripts.js"></script>

@yield('js')