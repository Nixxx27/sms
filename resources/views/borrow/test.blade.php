@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ $item->category }}
                <small>{{ $item->property_num }}</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('borrow') }}">Borrowed Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Show Items : {{ $item->category }}
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <button class="button success loading-pulse" onclick="window.location.href = 'print_borrow/{{ $item->category }}'"><i class="fa fa-print"></i> Print</button>
            <button class="button info" onclick="window.location.href = 'excel_borrow/{{ $item->category }}'"><i class="fa fa-file-excel-o fa-2x"></i></button>

            <div class="example" data-text="">
                <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                    <thead>
                    <tr>
                        <th width="40px">#</th>
                        <th>Borrower's Name</th>
                        <th>Item Description</th>
                        <th>Serial</th>
                        <th>Borrowed Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($borrow as $borrows)
                        <tr>
                            <td>{{ $borrows->id }}</td>
                            <td>{{ $borrows->name }}</td>
                            <td>{{ $borrows->item_name }}</td>
                            <td>{{ $borrows->serial }}</td>
                            <td>{{ $borrows->date->format('M d Y D') }}<br>
                                <span style="font-style:italic;font-size:12px"> {{ $borrows->date->diffForHumans() }} </span>
                            </td>
                            <td style="text-align:center">
                                {{ Form::open(array('url' => 'borrow/return/'.$borrows->id,'method' => 'GET')) }}
                                <button class="btn btn-success" title="Return Item"> Return</button>
                                {!! Form::close() !!}
                            </td>
                            <td style="text-align:center">
                                {{ Form::open(array('url' => 'borrow/lost/'.$borrows->id,'method' => 'GET')) }}
                                <button class="btn btn-danger" title="Borrow Item"> Lost</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!--example-->
            {!! $borrow->render() !!}
        </div>
    </div>

@endsection


