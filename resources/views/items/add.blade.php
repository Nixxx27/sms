@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                New
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('items') }}">Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Add new
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-7">
            @include('errors.list')
            {!! Form::open(array('name'=>'add_item','id'=>'add_item','action'=>'ItemsController@store')) !!}
            <div class="example" data-text="">
                <div class="grid">

                    <div class="row cells2">
                        {{--<div class="cell">--}}
                            {{--<label for="serial"> Serial Number</label>--}}
                            {{--<div class="input-control text full-size {{ $errors->has('serial')?  ' error block-shadow-danger' : '' }}">--}}
                                {{--<input type="text" name="serial" id="serial" value="{{old('serial')}}">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="cell">
                            <label for="property_num"> Property Number</label>
                            <div class="input-control text full-size {{ $errors->has('property_num')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="property_num" id="property_num" value="{{old('property_num')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row cells2">
                        <div class="cell">
                            <label for="item_desc"> Description</label>
                           <div class="input-control select full-size {{ $errors->has('item_desc')?  ' error block-shadow-danger' : '' }}">
                                <select id="item_desc" name="item_desc">
                                    <option value="">-- Please Select--</option>
                                    @foreach( $desc as $descs)
                                        <option>{{ $descs->item_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="cell">
                            <label for="category"> Category</label>
                            <div class="input-control select full-size {{ $errors->has('category')?  ' error block-shadow-danger' : '' }}">
                            <select id="category" name="category">
                                <option value="">-- Please Select--</option>
                                @foreach( $cat as $category)
                                    <option>{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="row cells2">
                        <div class="cell">
                            <label for="quantity"> Quantity</label>
                            <div class="input-control text full-size {{ $errors->has('quantity')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="quantity" id="quantity" value="{{old('quantity')}}">
                            </div>
                        </div>

                        <div class="cell">
                            <label for="condition"> Condition</label>
                            <div class="input-control select full-size {{ $errors->has('condition')?  ' error block-shadow-danger' : '' }}">
                                {!! Form::select('condition',
                                array(''=>'-- Please Select--',
                                'good'=>'Good',
                                'defective' => 'Defective',
                                'repairable' => 'Repairable'),
                                ['style'=>'cursor:pointer;font-family: FontAwesome, Helvetica',
                                'id'=>'condition']) !!}
                            </div>

                        </div>
                    </div>

                    <div class="row cells1">
                        <div class="cell">
                            <button class="button primary  block-shadow-primary loading-pulse"><i class="fa fa-floppy-o"></i> Save</button>
                            <button onclick="goBack()" class="button danger"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                    </div>
                </div><!--grid-->
            </div><!--example-->
            {!! Form::close() !!}
        </div><!--md 7-->
    </div> <!-- /.row -->


@endsection
