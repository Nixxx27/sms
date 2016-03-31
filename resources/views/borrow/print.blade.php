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
    <script>
        window.print();

    </script>

    <style>
        @media print {
            .nottoprint {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="row">
    <div class="col-md-4" style="margin-left:20px;margin-bottom:10px">
        <button class="button primary loading-pulse nottoprint" onclick="goBack()"><i class="fa fa-chevron-circle-left"></i> Go Back</button>
    </div>
    <div class="col-md-12">
        <div class="example" data-text="">
            <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                <thead>
                <tr>
                    <th colspan="2" style="text-align:center"><h4><strong>Stocks Monitoring System</strong></h4></th>
                </tr>
                <tr>
                    <th>Property #</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borrow as $borrows)
                    <tr>
                        <td>{{ $borrows->property_num }}</td>
                        <td>{{ $borrows->category }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>

</html>
<script src="{{ $project_name }}/public/js/scripts.js"></script>
