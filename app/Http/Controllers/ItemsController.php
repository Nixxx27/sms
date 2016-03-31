<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\item;
use App\description;
use App\category;
use Maatwebsite\Excel;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Input;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $query = $request->search;

        $item = item::Where('item_desc', 'like', '%'.$query . '%')
            ->orWhere('category', 'like', '%'.$query . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $item->setPath('items');

        return view('items.list', compact('item', 'query'));

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desc = description::all();
        $cat = category::all();
        return view('items.add',compact('desc','cat') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        
//        if (item::where('category', '=', $request->category)->count() > 0)
//        {
//            return redirect('items')->with([
//            'error_msg' => "duplicate entry. Category $request->category found in the database"
//            ]);
//        }

        item::create( $request->all() );
        return redirect('items')->with([
            'flash_message' => "New Item succesfully Added!"
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
        return "show" + ($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::findorfail($id);
        $desc = description::all();
        $cat = category::all();
       return view('items.edit',compact('item','desc','cat') );
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
        $item = item::findorfail($id);
        $item->update( $request->all() );

        return redirect('items')->with([
            'flash_message' => 'Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = item::findorfail($id);
        $item->delete();

        return redirect('items')->with([
            'flash_message' => 'Deleted Successfully'
        ]);
    }

    public function reserve($id)
    {
        return "reserve me" . $id;
    }

    public function search(Request $request)
    {

        $query = $request->search;

        $item = item::Where('item_desc', 'like', '%'.$query . '%')
            ->orWhere('category', 'like', '%'.$query . '%')
            ->paginate(10);
        $item->setPath('items');

        return view('items.list', compact('item', 'query'));
    }


    public function print_all()
    {
        $item = item::all();
        return view('items.print',compact('item') );
    }

    public function export_excel()
    {
        \Excel::create('SMS- Item Lists', function ($excel)  {

            $excel->sheet('Item Lists', function ($sheet)  {
                $item = item::all( ['id','property_num','item_desc','category','quantity','condition'] );
                $sheet->fromArray( $item );
                $sheet->row(1,array('#','Property Num','Item Description','Category','Quantity','Condition'));
                $sheet->cell('A1:F1', function($cells) {
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
