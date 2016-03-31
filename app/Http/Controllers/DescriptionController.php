<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\description;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desc = description::orderBy('id', 'desc')->paginate(10);
        $desc->setPath('desc');

        return view('description.list',compact('desc') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('description.add');
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
                'item_name' => 'required|min:2',
            ]);

        description::create( $request->all() );
        return redirect('desc')->with([
            'flash_message' => "New Item Description succesfully Added!"
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
        $desc = description::findorfail($id);
        return view('description.edit',compact('desc') );
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
        $desc = description::findorfail($id);
        $desc->update( $request->all() );

        return redirect('desc')->with([
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
        $desc = description::findorfail($id);
        $desc->delete();

        return redirect('desc')->with([
            'flash_message' => 'Deleted Successfully'
        ]);
    }
}
