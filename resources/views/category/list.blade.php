@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Items
                <small>Category</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Category
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class=" col-md-10  col-sm-10">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }} <i class="fa fa-check"></i>
                </div>
            @endif
        </div>
        <div class="col-md-12 col-sm-12">
            <button class="button danger loading-pulse" onclick="window.location.href = 'category/create'"><i class="fa fa-file-text-o"></i> Add Category</button>
            <hr>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">

            <div class="example" data-text="">
                <table class="table striped hovered cell-hovered border bordered" id="main_table_demo">
                    <thead>
                    <tr>
                        <th class="sortable-column">#</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cat as $category)
                        <tr>
                            <td>{{( $category->id ) }}</td>
                            <td>{{( $category->cat_name ) }}</td>
                            <td style="text-align:center">
                                {!! Form::open(['method'=>'GET', 'action' => ['CategoryController@edit', $category->id]]) !!}
                                <button class="btn btn-default btn-sm" title="Edit {{ $category->cat_name }}"><span style="font-weight: bold"><i class="fa fa-pencil"></i> Edit</span></button>
                                {!! Form::close() !!}
                            </td>
                            <td style="text-align:center">
                                {!! Form::open(['method'=>'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) !!}
                                <button class="btn btn-default btn-sm" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete {{ $category->cat_name }}"><span style="font-weight: bold"><i class="fa fa-times"></i> Delete</span></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
                {!! $cat->render() !!}
            </div>
        </div>


    </div>

@endsection


