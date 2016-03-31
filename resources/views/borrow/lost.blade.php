@extends('layouts.template')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Lost
                <small>Item</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i>  <a href="{{ url('borrow') }}">Borrowed Items</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> Lost Item
                </li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5">
            @include('errors.list')
            <div class="example" data-text="">
                {!! Form::open(array('name'=>'lost_item','id'=>'lost_item','action'=>'LostController@store')) !!}
                <h4><strong>Lost Item</strong></h4><hr>
                <input type="hidden" name="item_id" value="{{ $borrow->item_id }}">
                <input type="hidden" name="id_num" value="{{ $borrow->id_num }}">
                <input type="hidden" name="name" value="{{ $borrow->name }}">
                <input type="hidden" name="item_name" value="{{  $borrow->item_name }}">
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
            </div>
        </div>

    </div> <!-- /.row -->


@endsection

