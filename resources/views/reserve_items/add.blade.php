@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reserve
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('item') }}">Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Reserved new
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-7">
            @include('errors.list')
            {!! Form::open(array('name'=>'reserve_item','id'=>'reserve_item','action'=>'ReserveController@store')) !!}
            <div class="example" data-text="">
                <div class="grid">
                    <div class="row cells2">
                        <div class="cell">
                            <label> Item Description :</label>
                            <p>{{ ucwords($item->item_desc) }}</p>
                            <input type="hidden" name="item_name" value="{{ $item->item_desc }}">
                            <input type="hidden" name="item_id"  value="{{ $item->id }}">
                        </div>

                        <div class="cell">
                            <label> Property Number :</label>
                            <p>{{ $item->property_num }}</p>
                            <input type="hidden" name="property_num" value="{{ $item->property_num }}">
                        </div>
                    </div>

                    <div class="row cells2">
                        <div class="cell">
                            <label> Category :</label>
                            <p>{{ $item->category }}</p>
                            <input type="hidden" name="category" value="{{ $item->category }}">
                        </div>
                        <div class="cell">
                            <label> Condition :</label>
                            <p>{{ $item->condition }}</p>
                            <input type="hidden" name="condition" value="{{ $item->condition }}">
                        </div>
                    </div>

                    <div class="row cells2">
                        <div class="cell">
                            <label for="serial"> Serial</label>
                            <div class="input-control text full-size {{ $errors->has('serial')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="serial" id="serial" value="{{ old('serial') }}">
                            </div>
                            {{--<label for="serial"> Serial</label>--}}
                            {{--<div class="input-control select full-size {{ $errors->has('serial')?  ' error block-shadow-danger' : '' }}">--}}
                                {{--<select id="serial" name="serial">--}}
                                    {{--<option value="">-- Please Select--</option>--}}
                                    {{--@foreach( $serial_num as $serial )--}}
                                        {{--<option>{{ $serial->serial }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <hr>
                    <div class="row cells2">
                        <div class="cell">
                            <h4><strong>Reserved to:</strong></h4>
                        </div>

                    </div>
                    <div class="row cells2">
                        <div class="cell">
                            <label for="id_num"> ID Number</label>
                            <div class="input-control text full-size {{ $errors->has('id_num')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="id_num" id="id_num" value="{{ old('id_num') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row cells2">
                        <div class="cell2">
                            <label for="name"> Borrower's Name</label>
                            <div class="input-control text full-size {{ $errors->has('name')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="name" id="name" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row cells1">
                        <div class="cell">
                            <button class="button primary  block-shadow-primary loading-pulse" onclick="return confirm('Reserved Item?')"><i class="fa fa-floppy-o"></i> Save</button>
                            <button onclick="goBack()" class="button danger"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                    </div>
                </div><!--grid-->
            </div><!--example-->
            {!! Form::close() !!}
        </div><!--md 7-->
    </div> <!-- /.row -->


@endsection
