@extends('layouts.template')

@section('content')

@section('css')
    <style>

        /*table{*/
            /*table-layout: fixed;*/
        /*}*/
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
                Reserved
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/items') }}">Item List</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Reserved Item List
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
            {!! Form::open(array('action' => 'ReserveController@index','method'=>'GET')) !!}
            <div class="input-control text">
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <button type="submit" class="button primary loading-pulse"><i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10">
            <button class="button success loading-pulse bn" onclick="window.location.href = 'reserve/print'"><i class="fa fa-print"></i> Print</button>
            <button class="button info" onclick="window.location.href = 'reserve/excel'"><i class="fa fa-file-excel-o fa-2x"></i></button>
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
                    <th>Reserved Date</th>
                    <th>Expiration Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($reserve_item as $reserve_items)
                    <tr>
                        <td>{{ $reserve_items->serial }}</td>
                        <td>{{ $reserve_items->property_num }}</td>
                        <td>{{ $reserve_items->item_name }}</td>
                        <td>{{ $reserve_items->category }}</td>
                        <td>{{ $reserve_items->condition }}</td>
                        <td>{{ $reserve_items->id_num }}</td>
                        <td>{{ $reserve_items->name }}</td>
                        <td>{{ $reserve_items->date_reserve->format('M d Y D') }}</td>
                        <td>{{ $reserve_items->date_expire->format('M d Y D') }}<br> </td>
                        <td style="text-align: center">
                            @if ( $date_now > $reserve_items->date_expire )
                                {{  $reserve_items->date_expire->diffForHumans() }}
                                <span class="btn-danger" style="padding-left:2px;padding-right:2px">Expired</span>
                            @else
                                <span> {{ $reserve_items->date_reserve->diffForHumans( $reserve_items->date_expire ) }}</span>
                            @endif
                        </td>
                        <td style="text-align:center">
                            {!! Form::open(['method'=>'GET', 'action' => ['ReserveController@edit', $reserve_items->id]]) !!}
                            <button class="btn btn-primary"><i class="fa fa-chevron-circle-right"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
            {!! $reserve_item->render() !!}
            {{--{!! $reserve_item->appends(['search' => Input::get('search') ])->render() !!}--}}

        </div>


    </div>

@endsection


