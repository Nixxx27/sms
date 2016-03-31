@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                New
                <small>Item category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('category') }}">Category</a>
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
            {!! Form::open(array('name'=>'add_category','id'=>'add_category','action'=>'CategoryController@store')) !!}
            <div class="example" data-text="">
                <div class="grid">

                    <div class="row cells2">
                        <div class="cell">
                            <label for="item_name"> Item Category</label>
                            <div class="input-control text full-size {{ $errors->has('cat_name')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="cat_name" id="cat_name" value="{{old('cat_name')}}">
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
