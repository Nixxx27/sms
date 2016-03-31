@extends('layouts.template')

@section('content')

@section('css')
    <style>

        table{
            table-layout: fixed;
        }
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
                Returned
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/items') }}">Item List</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Returned Item List
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class=" col-md-8  col-sm-8">
            <button class="button success loading-pulse" onclick="window.location.href = 'return/print'"><i class="fa fa-print"></i> Print</button>
            <button class="button info" onclick="window.location.href = 'return/excel'"><i class="fa fa-file-excel-o fa-2x"></i></button>
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
            {!! Form::open(array('action' => 'ReturnController@index','method'=>'GET')) !!}
            <div class="input-control text">
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <button type="submit" class="button primary loading-pulse"><i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>


        <div class="col-lg-10 col-md-10 col-sm-10">
            <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                <thead>
                <tr>
                    <th>Serial #</th>
                    <th>Property #</th>
                    <th>Item Description</th>
                    <th>Category</th>
                    <th>Condition</th>
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Date Borrowed</th>
                    <th>Date Returned</th>
                </tr>
                </thead>
                <tbody>
                @foreach($return_item as $return_items)
                    <tr>
                        <td>{{ $return_items->serial }}</td>
                        <td>{{ $return_items->property_num }}</td>
                        <td>{{ $return_items->item_name }}</td>
                        <td>{{ $return_items->category }}</td>
                        <td>{{ $return_items->condition }}</td>
                        <td>{{ $return_items->id_num }}</td>
                        <td>{{ $return_items->name }}</td>
                        <td>{{ $return_items->date_borrow->format('M d Y D') }}</td>
                        <td style="font-weight: bold">{{ $return_items->date_return->format('M d Y D') }}<br>
                            <span style="font-style:italic;font-size:12px">  {{ $return_items->date_return->diffForHumans( $return_items->date_borrow ) }}</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
            {!! $return_item->render() !!}

        </div>


    </div>

@endsection


