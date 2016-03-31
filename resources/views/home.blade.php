@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $item_count }}</div>
                            <div>Items</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href='{{ url('/items') }}'>View Details</a></span>
                        <span class="pull-right"><a href='{{ url('/items') }}'><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $borrow_count }}</div>
                            <div>Borrowed Items</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href='{{ url('/borrow') }}'>View Details</a></span>
                        <span class="pull-right"><a href='{{ url('/borrow') }}'><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $reserve_count }}</div>
                            <div>Reserved Items</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href='{{ url('/reserve') }}'>View Details</a></span>
                        <span class="pull-right"><a href='{{ url('/reserve') }}'><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $lost_count }}</div>
                            <div>Lost Items!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left"><a href='{{ url('/lost') }}'>View Details</a></span>
                        <span class="pull-right"><a href='{{ url('/lost') }}'><i class="fa fa-arrow-circle-right"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->


@endsection

