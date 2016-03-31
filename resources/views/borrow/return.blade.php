@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Return
                <small>Item</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('borrow') }}">Borrowed Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Return Item
                </li>
            </ol>
        </div>

    </div>

    <!-- Page Heading -->
    <div class="row">
        <div class="row">
            <div class="col-md-5">
                @include('errors.list')

                {!! Form::open(array('name'=>'borrow_return','id'=>'borrow_return','action'=>'ReturnController@store')) !!}
                <div class="example" data-text="">
                    <table class="table" >
                        <tr>
                            <td>
                                <label> Item Name :</label>
                                <p>{{ $borrow->item_name }}</p>
                                <input type="hidden" name="item_name" value="{{ $borrow->item_name }}">
                            </td>
                            <td>
                                <label> Item Name :</label>
                                <p>{{ $borrow->item_name }}</p>
                                <input type="hidden" name="item_name" value="{{ $borrow->item_name }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> Date Borrowed :</label>
                                <p>{{ $borrow->date->format('M d Y D') }} - <span style="font-weight:bold;font-style:italic">{{ $borrow->date->diffForHumans() }}</span></p>
                                <input type="hidden" name="date_borrow" value="{{ $borrow->date }}">
                                <input type="hidden" name="item_id" value="{{ $borrow->item_id }}">
                                <input type="hidden" name="serial" value="{{ $borrow->serial }}">
                                <input type="hidden" name="property_num" value="{{ $borrow->property_num }}">
                                <input type="hidden" name="category" value="{{ $borrow->category }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label> Borrower's Name :</label>
                                <p>{{ $borrow->name }}</p>
                                <input type="hidden" name="name" value="{{ $borrow->name }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label> ID Number :</label>
                                <p>{{ $borrow->id_num }}</p>
                                <input type="hidden" name="id_num" value="{{ $borrow->id_num }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date_return"> Date Returned</label>
                                <div class="input-control text full-size {{ $errors->has('date_return')?  ' error block-shadow-danger' : '' }}">
                                    <input type="date" name="date_return" id="date_return">
                                </div
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <label for="condition"> Condition</label>
                                <div class="input-control select full-size {{ $errors->has('condition')?  ' error block-shadow-danger' : '' }}">
                                    {!! Form::select('condition',
                                    array($borrow->condition=> ucwords($borrow->condition),
                                    'good'=>'Good',
                                    'defective' => 'Defective',
                                    'repairable' => 'Repairable'),
                                    ['style'=>'cursor:pointer;font-family: FontAwesome, Helvetica',
                                    'id'=>'condition']) !!}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="button success  block-shadow-primary loading-pulse" onclick="return confirm('Return this Item?')"><i class="fa fa-reply"></i> Return</button>
                            </td>
                        </tr>

                    </table>
                </div><!--example-->
                {!! Form::close() !!}
            </div>

        </div>

    </div> <!-- /.row -->


@endsection
