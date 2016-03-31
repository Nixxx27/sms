<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\item;
use App\borrow;
use App\serial_num;
use Illuminate\Support\Facades\Redirect;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $query = $request->search;

        $borrow = borrow::where('serial', 'like', '%'.$query . '%')
            ->orWhere('item_id', 'like', '%'.$query . '%')
            ->orWhere('name', 'like', '%'.$query . '%')
            ->orWhere('item_name', 'like', '%'.$query . '%')
            ->orWhere('date', 'like', '%'.$query . '%')
            ->orWhere('property_num', 'like', '%'.$query . '%')
            ->orWhere('category', 'like', '%'.$query . '%')
            ->orWhere('condition', 'like', '%'.$query . '%')
            ->orderBy('id', 'desc')
            ->groupBy('category')
            ->paginate(10);
        $borrow->setPath('borrow');

        $test = borrow::where('category', 'like', '%'.$request->category . '%')->count();


        return view('borrow.list', compact('borrow', 'query','borrow_count','test'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $serial_num = serial_num::all();

        $item = item::findorfail($id);
        return view('borrow.add',compact('item','serial_num') );
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
                'id_num' => 'required',
        		'name'	 => 'required|min:2',
        		'item_name'=> 'required|min:2',
        		//'quantity' => 'required|numeric',
        		'date'		=> 'required|min:2',
        		'serial'	=> 'required|min:2',
        		'property_num'	=> 'required|min:2',
        		'condition'	=> 'required|min:2',
        		'category'	=> 'required|min:2'
            ]);

             $item = item::find( $request->item_id );

            //update item record quantity minus 1 borrowed
            $new_qty = $item->quantity - 1;
            $item->update( ['quantity' => $new_qty ] );
            $item->save();

            borrow::create( $request->all() );
            return redirect('borrow')->with([
                'flash_message' => "Borrowed Item succesfully!"
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $borrow =   borrow::where('category', 'like', '%'.$category . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(15);
        $item =     item::where('category', 'like', '%'.$category . '%')->first();
        return view('borrow.test',compact('borrow','item') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = borrow::findorfail($id);
        return view('borrow.edit',compact('borrow') );
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
        $borrow = borrow::findorfail($id);
        $borrow->delete();

        return redirect('borrow')->with([
            'flash_message' => 'Deleted Successfully'
        ]);
    }

    /*
     *
     * @param int $id
     * return Lost view
     */
    public function lost($id)
    {
        $borrow = borrow::findorfail($id);
        return view('borrow.lost',compact('borrow') );
    }

    public function return_item($id)
    {
        $borrow = borrow::findorfail($id);
        return view('borrow.return',compact('borrow') );
    }

    public function print_all()
    {
        $borrow = borrow::all();
        return view('borrow.print',compact('borrow') );
    }

    public function print_borrow($category)
    {
        $borrow =   borrow::where('category', 'like', '%'.$category . '%')->get();
        return view('borrow.print_borrow',compact('borrow') );
    }

    public function export_excel()
    {
        \Excel::create('SMS- Borrowed Item', function ($excel)  {

            $excel->sheet('Borrow Lists', function ($sheet)  {
                $borrow = borrow::all( ['id','property_num','category'] );
                $sheet->fromArray( $borrow );
                $sheet->row(1,array('#','Property Num','Category'));
                $sheet->cell('A1:C1', function($cells) {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  true
                    ));//setFont
                });//Sheet->cell
            });//Sheet->sheet

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('borrow');
    }

    public function export_excel_borrow($category)
    {
        $this->category = $category;
        \Excel::create("SMS- Borrowed ". $this->category, function ($excel)  {

            $excel->sheet("Borrowed Item " . $this->category, function ($sheet)  {
                $borrow = borrow::Where('category',"=", $this->category)->get(['id','id_num','name','serial','item_name','category','date','condition'] );
                $sheet->fromArray( $borrow );
                $sheet->row(1,array('#','Borrower ID Num','Name','Serial','Item Description','Category','Date Borrowed','Condition'));
                $sheet->cell('A1:H1', function($cells) {
                    $cells->setBackground('#000000');
                    $cells->setFontColor('#ffffff');
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '12',
                        'bold'       =>  true
                    ));//setFont
                });//Sheet->cell
            });//Sheet->sheet

        })->store('xls', storage_path('excel/exports'))->export('xls')->redirect('borrow');
    }
}
