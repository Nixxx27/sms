<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\reserve_item;
use App\item;
use App\borrow;
use App\serial_num;
use Illuminate\Support\Facades\Redirect;
use carbon\carbon;
class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $query = $request->search;

        $reserve_item = reserve_item::where('serial', 'like', '%'.$query . '%')
            ->orWhere('item_id', 'like', '%'.$query . '%')
            ->orWhere('name', 'like', '%'.$query . '%')
            ->orWhere('item_name', 'like', '%'.$query . '%')
            ->orWhere('date_reserve', 'like', '%'.$query . '%')
            ->orWhere('date_expire', 'like', '%'.$query . '%')
            ->orWhere('property_num', 'like', '%'.$query . '%')
            ->orWhere('category', 'like', '%'.$query . '%')
            ->orWhere('condition', 'like', '%'.$query . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $reserve_item->setPath('items');

        return view('reserve_items.list', compact('reserve_item', 'query'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'id_num' => 'required|min:2',
                'name'	 => 'required|min:2',
                'item_name'=> 'required|min:2',
                //'quantity' => 'required|numeric',
                'serial'	=> 'required|min:2',
                'property_num'	=> 'required|min:2',
                'condition'	=> 'required|min:2',
                'category'	=> 'required|min:2'
            ]);

            $request['date_reserve'] =Carbon::now();
            $request['date_expire'] = Carbon::now()->addDays(3);
            reserve_item::create( $request->all() );

            //update item record quantity minus 1 reserved
                $item = item::find( $request->item_id );
                $new_qty = $item->quantity - 1;
                $item->update( ['quantity' => $new_qty ] );
                $item->save();

            return redirect('reserve')->with([
                'flash_message' => "Reserved Item succesfully!"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serial_num = serial_num::all();
        $item = item::findorfail($id);
        return view('reserve_items.add',compact('item','serial_num') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve_item = reserve_item::find( $id );
        return view('reserve_items.edit',compact('reserve_item') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Add reserve to Borrowed List
        $this->validate($request,
            [
                'id_num' => 'required|min:2',
                'name'	 => 'required|min:2',
                'item_name'=> 'required|min:2',
                //'quantity' => 'required|numeric',
                'date'		=> 'required|min:2',
                'serial'	=> 'required|min:2',
                'property_num'	=> 'required|min:2',
                'condition'	=> 'required|min:2',
                'category'	=> 'required|min:2'
            ]);

             borrow::create( $request->all() );

            //delete to reserved list
            $matchThese = ['item_id' => $request->item_id,'serial' => $request->serial,'date_reserve' => $request->date ];
            $reserve_item = reserve_item::where( $matchThese );
            $reserve_item->delete();

             return redirect('borrow')->with([
                'flash_message' => "Confirmed succesfully!"
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $item = item::find( $request->item_id );

       //update item record quantity add 1 canceled reserve
       $new_qty = $item->quantity + 1;
       $item->update( ['quantity' => $new_qty ] );
       $item->save();

       $reserve_item = reserve_item::findorfail($id);
       $reserve_item->delete();


        return redirect('reserve')->with([
                'flash_message' => "Reservation cancelled successfully!"
            ]);

    }

    public function print_all()
    {
        $reserve_item = reserve_item::all();
        return view('reserve_items.print',compact('reserve_item') );
    }

    public function export_excel()
    {
        \Excel::create('SMS- Reserved Items', function ($excel)  {

            $excel->sheet('Reserved Lists', function ($sheet)  {
                $reserve_item = reserve_item::all( ['id','serial','item_name','category','condition','id_num','name','date_reserve','date_expire'] );
                $sheet->fromArray( $reserve_item );
                $sheet->row(1,array('#','Serial','Item Description','Category','Condition','Borrower ID num','Name','Date Reserve','Date Expire'));
                $sheet->cell('A1:I1', function($cells) {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  true
                    ));//setFont
                });//Sheet->cell
            });//Sheet->sheet

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('reserve');
    }
}
