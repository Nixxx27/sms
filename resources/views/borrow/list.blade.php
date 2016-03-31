@extends('layouts.template')

@section('content')

@section('css')
<style>

#main_table_demo th{
    text-align: center;
    padding:2px;
}
td{
    word-wrap:break-word
}
</style>
@endsection
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Borrowed
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/items') }}">Item List</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Borrowed Item List
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class=" col-md-10  col-sm-10">
             @if(Session::has('error_msg'))

             <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <strong>Error</strong>  {{ Session::get('error_msg') }}
            </div>
            @endif

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }} <i class="fa fa-check"></i>
                </div>
            @endif
        </div>

        <div class="col-md-3 col-lg-3 pull-right">
            {!! Form::open(array('action' => 'BorrowController@index','method'=>'GET')) !!}
            <div class="input-control text">
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <button type="submit" class="button primary loading-pulse"><i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>
       <div class="col-lg-5 col-md-5 col-sm-5">
           <button class="button success loading-pulse" onclick="window.location.href = 'borrow/print'"><i class="fa fa-print"></i> Print</button>
           <button class="button info" onclick="window.location.href = 'borrow/excel'"><i class="fa fa-file-excel-o fa-2x"></i></button>
            <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                <thead>
                   <tr>
                        <th>Property #</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrow as $borrows)
                        <tr>
                            <td>{{ $borrows->property_num }}</td>
                            <td>{{ $borrows->category }}</td>
                            <td style="text-align:center">
                                {!! Form::open(['method'=>'GET', 'action' => ['BorrowController@show', $borrows->category]]) !!}
                                <button class="btn btn-primary">view <i class="fa fa-chevron-circle-right"></i></button>
                                {!! Form::close() !!}
                            </td>
                            {{--<td style="text-align:center">--}}
                                {{--{!! Form::open(['method'=>'DELETE', 'action' => ['BorrowController@destroy', $borrows->id]]) !!}--}}
                                {{--<button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-times"></i> </button>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
       </div>
            <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
                {!! $borrow->render() !!}
            </div>


    </div>

@endsection


