<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\serial_num;
use App\Http\Controllers\Controller;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serial_num = serial_num::orderBy('id', 'desc')->paginate(10);
        $serial_num->setPath('desc');

        return view('serial_num.list',compact('serial_num') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serial_num.add');
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
                'serial' => 'required|min:2',
            ]);

        serial_num::create( $request->all() );
        return redirect('serial')->with([
            'flash_message' => "New Serial Added!"
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
        $serial_num = serial_num::findorfail($id);
        return view('serial_num.edit',compact('serial_num') );
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
        $serial_num = serial_num::findorfail($id);
        $serial_num->update( $request->all() );

        return redirect('serial')->with([
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
        $serial_num = serial_num::findorfail($id);
        $serial_num->delete();

        return redirect('serial')->with([
            'flash_message' => 'Deleted Successfully'
        ]);
    }
}
