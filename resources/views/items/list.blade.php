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
    word-wrap:break-word;
}
</style>
@endsection
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Items
                <small>List</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Items
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

        <div class="col-md-6 col-sm-6">
            <button class="button danger loading-pulse" onclick="window.location.href = 'items/create'"><i class="fa fa-file-text-o"></i> Add Items</button>
            <button class="button success loading-pulse" onclick="window.location.href = 'items/print'"><i class="fa fa-print"></i> Print</button>
            <button class="button info" onclick="window.location.href = 'items/excel'"><i class="fa fa-file-excel-o fa-2x"></i></button>
        </div>
        <div class="col-md-3 col-lg-3 pull-right">
            {!! Form::open(array('action' => 'ItemsController@index','method'=>'GET')) !!}
            <div class="input-control text">
                <input type="text" name="search" placeholder="Search here...">
            </div>
            <button type="submit" class="button primary loading-pulse"><i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
        <div class="col-lg-8 col-md-8 col-sm-8">

            <div class="example" data-text="">
                <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                    <thead>
                    <tr>
                        <th class="sortable-column" style="width:25px">#</th>
                        <th>Property #</th>
                        <th>Item Description</th>
                        <th>Category</th>
                        <th>Condition</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $items)
                        <tr>
                            <td>{{( $items->id ) }}</td>
                           <td>{{( $items->property_num ) }}</td>
                            <td>{{( $items->item_desc ) }}</td>
                            <td>{{( $items->category ) }}</td>
                            <td>{{( $items->condition ) }}</td>
                            <td  style="text-align:center"><strong>{{( $items->quantity ) }}</strong></td>
                            @if( $items->quantity == 0)
                                <td style="text-align:center"><button type="button" class="btn btn-primary" disabled="disabled">Borrow</button></td>
                                <td style="text-align:center"><button type="button" class="btn btn-info" disabled="disabled">Reserve</button></td>
                            @else
                                <td style="text-align:center">
                                        {{ Form::open(array('url' => 'borrow/create/'.$items->id,'method' => 'GET')) }}
                                        <button class="btn btn-primary" title="Borrow Item"> Borrow</button>
                                        {!! Form::close() !!}
                                </td>
                                <td style="text-align:center">
                                        {{ Form::open(array('url' => 'reserve/'.$items->id,'method' => 'GET')) }}
                                        <button class="btn btn-info" title="Reserve Item">Reserve</button>
                                        {!! Form::close() !!}
                                </td>
                            @endif

                            <td style="text-align:center">
                                {!! Form::open(['method'=>'GET', 'action' => ['ItemsController@edit', $items->id]]) !!}
                                <button class="btn btn-success" title="Edit {{ $items->serial }}"><i class="fa fa-pencil"></i></button>
                                {!! Form::close() !!}
                            </td>
                            <td style="text-align:center">
                                {!! Form::open(['method'=>'DELETE', 'action' => ['ItemsController@destroy', $items->id]]) !!}
                                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{ $items->serial }}"><i class="fa fa-times"></i> </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
                {{--{!! $item->render() !!}--}}
                {!! $item->appends(['search' => Input::get('search') ])->render() !!}
            </div>
        </div>
    </div>

@endsection
