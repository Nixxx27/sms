@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ReturnSHOW
                <small>Items</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('borrow') }}">Borrow Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Show Item
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->
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
                    </tr>
                    <tr>
                        <td>
                            <label> Date Borrowed :</label>
                            <p>{{ $borrow->date->format('M d Y D') }} - <span style="font-weight:bold;font-style:italic">{{ $borrow->date->diffForHumans() }}</span></p>
                            <input type="text" name="date_borrow" value="{{ $borrow->date }}">
                            <input type="text" name="item_id" value="{{ $borrow->item_id }}">
                            <input type="text" name="serial" value="{{ $borrow->serial }}">
                            <input type="text" name="property_num" value="{{ $borrow->property_num }}">
                            <input type="text" name="category" value="{{ $borrow->category }}">
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
                            <label> Quantity :</label>
                            <p>{{ $borrow->quantity }}</p>
                            <input type="hidden" name="quantity" value="{{ $borrow->quantity }}">
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
                            <button class="button success  block-shadow-primary loading-pulse" onclick="return confirm('Save Changes?')"><i class="fa fa-reply"></i> Save</button>
                            <button onclick="goBack()" class="button danger"><i class="fa fa-times"></i> Cancel</button>
                        </td>
                    </tr>

                </table>
            </div><!--example-->
            {!! Form::close() !!}
        </div>
        <div class="col-md-5">
            <div class="example" data-text="">
                {!! Form::open(array('name'=>'lost_item','id'=>'lost_item','action'=>'LostController@store')) !!}
                <h4><strong>Lost Item</strong></h4><hr>
                <input type="hidden" name="item_id" value="{{ $borrow->item_id }}">
                <input type="hidden" name="id_num" value="{{ $borrow->id_num }}">
                <input type="hidden" name="name" value="{{ $borrow->name }}">
                <input type="hidden" name="item_name" value="{{  $borrow->item_name }}">
                <input type="hidden" name="quantity" value="{{ $borrow->quantity }}">
                <input type="hidden" name="date_borrow" value="{{ $borrow->date }}">
                <input type="hidden" name="serial" value="{{ $borrow->serial }}">
                <input type="hidden" name="property_num" value="{{ $borrow->property_num }}">
                <input type="hidden" name="category" value="{{ $borrow->category }}">
                <input type="hidden" name="condition" value="{{ $borrow->condition }}"></td>

                <table>
                    <tr>
                        <td>
                            <label for="date_return"> Date Lost :</label>
                            <div class="input-control text full-size {{ $errors->has('date_return')?  ' error block-shadow-danger' : '' }}">
                                <input type="date" name="date_return" id="date_return">
                            </div
                        <td>
                    </tr>

                    <tr>
                        <td>
                            <button class="button primary  block-shadow-primary loading-pulse" onclick="return confirm('Are you sure you want to mark this as Lost Item??')"><i class="fa fa-times-circle"></i> Save</button>
                        </td>
                    </tr>

                </table>
                {!! Form::close() !!}
            </div><!--example-->
        </div><!--md 5-->
    </div> <!-- /.row -->


@endsection
