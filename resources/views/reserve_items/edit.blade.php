@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Confirm
                <small>Reserved</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('/reserve') }}">Reserved Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> confirm
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
        <div class="example" data-text="">
            <table>
                <tr>
                    <td>
                        {!! Form::open(array('method'=>'PATCH','name'=>'borrow_item','id'=>'borrow_item','action' => array('ReserveController@update', $reserve_item->id) )) !!}
                        <input type="hidden" name="item_id" value="{{ $reserve_item->item_id }}">
                        <input type="hidden" name="id_num" value="{{ $reserve_item->id_num }}">
                        <input type="hidden" name="name" value="{{ $reserve_item->name }}">
                        <input type="hidden" name="item_name" value="{{  $reserve_item->item_name }}">
                        <input type="hidden" name="date" value="{{ $reserve_item->date_reserve }}">
                        <input type="hidden" name="serial" value="{{ $reserve_item->serial }}">
                        <input type="hidden" name="property_num" value="{{ $reserve_item->property_num }}">
                        <input type="hidden" name="category" value="{{ $reserve_item->category }}">
                        <input type="hidden" name="condition" value="{{ $reserve_item->condition }}"></td>
                    <button class="button primary  block-shadow-primary loading-pulse" onclick="return confirm('Confirm reserve?')"><i class="fa fa-check-circle"></i> CONFIRM </button>
                    {!! Form::close() !!}

                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['ReserveController@destroy', $reserve_item->id]]) !!}
                        <input type="hidden" name="item_id" value="{{ $reserve_item->item_id }}">
                        <input type="hidden" name="id_num" value="{{ $reserve_item->id_num }}">
                        <input type="hidden" name="name" value="{{ $reserve_item->name }}">
                        <input type="hidden" name="item_name" value="{{  $reserve_item->item_name }}">
                        <input type="hidden" name="date" value="{{ $reserve_item->date_reserve }}">
                        <input type="hidden" name="serial" value="{{ $reserve_item->serial }}">
                        <input type="hidden" name="property_num" value="{{ $reserve_item->property_num }}">
                        <input type="hidden" name="category" value="{{ $reserve_item->category }}">
                        <input type="hidden" name="condition" value="{{ $reserve_item->condition }}"></td>
                    <button class="button danger  block-shadow-primary loading-pulse" onclick="return confirm('Are you sure you want to Cancel this reserve?')"><i class="fa fa-times"></i> Remove </button>
                    {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        </div><!--example-->
        </div>
    </div>

@endsection


