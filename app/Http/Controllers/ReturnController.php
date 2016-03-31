<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\borrow;
use App\return_item;
use App\item;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = $request->search;

        $return_item = return_item::where('serial', 'like', '%'.$query . '%')
            ->orWhere('name', 'like', '%'.$query . '%')
            ->orWhere('item_name', 'like', '%'.$query . '%')
            ->orWhere('category', 'like', '%'.$query . '%')
            ->orWhere('date_borrow', 'like', '%'.$query . '%')
            ->orWhere('date_return', 'like', '%'.$query . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $return_item->setPath('return');

        return view('return_items.list', compact('return_item', 'query'));
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
               // 'quantity' => 'required|numeric',
                'date_borrow'		=> 'required',
                'date_return'		=> 'required',
                'serial'	=> 'required|min:2',
                'property_num'	=> 'required|min:2',
                'condition'	=> 'required|min:2',
                'category'	=> 'required|min:2'
            ]);


        return_item::create( $request->all() );

        //update item record quantity add 1 returned item
        $item = item::find( $request->item_id );
        $new_qty = $item->quantity + 1;
        $item->update( ['quantity' => $new_qty ] );
        $item->save();

        //delete record to borrow db
        $matchThese = ['item_id' => $request->item_id,'serial' => $request->serial, 'date' => $request->date_borrow ];
        $borrow = borrow::where( $matchThese );
        $borrow->delete();


        return redirect('return')->with([
            'flash_message' => "Item Returned succesfully!"
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print_all()
    {
        $return_item = return_item::all();
        return view('return_items.print',compact('return_item') );
    }

    public function export_excel()
    {
        \Excel::create('SMS- Returned Lists', function ($excel)  {

            $excel->sheet('Returned Lists', function ($sheet)  {
                $return_item = return_item::all( ['id','serial','item_name','category','condition','id_num','name','date_borrow','date_return'] );
                $sheet->fromArray( $return_item );
                $sheet->row(1,array('#','Serial','Item Description','Category','Condition','Borrower ID num','Name','Date Borrowed','Date Return'));
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

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('items');
    }
}
