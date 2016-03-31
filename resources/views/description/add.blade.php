@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                New
                <small>Item Description</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('desc') }}">item Description</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Add new
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            @include('errors.list')
            {!! Form::open(array('name'=>'add_item_desc','id'=>'add_item_desc','action'=>'DescriptionController@store')) !!}
            <div class="example" data-text="">
                <div class="grid">

                    <div class="row cells2">
                        <div class="cell2">
                            <label for="item_name"> Item Description</label>
                            <div class="input-control text full-size {{ $errors->has('item_name')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="item_name" id="item_name" value="{{old('item_name')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row cells2">
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
