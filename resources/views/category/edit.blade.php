@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit
                <small>Category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('category') }}"> Category</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Edit
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-7">
            @include('errors.list')
            {!! Form::open(array('method'=>'PATCH','name'=>'edit_category','id'=>'edit_category','action' => array('CategoryController@update', $cat->id) )) !!}
            <div class="example" data-text="">
                <div class="grid">

                    <div class="row cells2">
                        <div class="cell">
                            <label for="item_name"> Category</label>
                            <div class="input-control text full-size {{ $errors->has('cat_name')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="cat_name" id="cat_name" value="{{ $cat->cat_name }}">
                            </div>
                        </div>
                    </div>

                    <div class="row cells1">
                        <div class="cell">
                            <button class="button primary  block-shadow-primary loading-pulse"><i class="fa fa-floppy-o"></i> Update</button>
                            <button onclick="goBack()" class="button danger"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                    </div>
                </div><!--grid-->
            </div><!--example-->
            {!! Form::close() !!}
        </div><!--md 7-->
    </div> <!-- /.row -->


@endsection
