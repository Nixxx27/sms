@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit
                <small>Serial</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('serial') }}"> Serials</a>
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
            {!! Form::open(array('method'=>'PATCH','name'=>'edit_serial','id'=>'edit_serial','action' => array('SerialController@update', $serial_num->id) )) !!}
            <div class="example" data-text="">
                <div class="grid">

                    <div class="row cells2">
                        <div class="cell">
                            <label for="item_name"> Serial</label>
                            <div class="input-control text full-size {{ $errors->has('serial')?  ' error block-shadow-danger' : '' }}">
                                <input type="text" name="serial" id="serial" value="{{ $serial_num->serial }}">
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
