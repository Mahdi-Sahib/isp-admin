<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:refill_cards'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new RefillCard;
            $data->supplier_id                     = $request->supplier_id;
            $data->title                           = $request->title;
            $data->description                     = $request->description;
            $data->thumb                           = $request->thumb;
            $data->image                           = $request->thumb;
            $data->code                            = $request->code;
            $data->code                            = $request->code;
            $data->currency                        = 'usd';
            $data->cost_price                      = $request->cost_price;
            $data->selling_price                   = $request->selling_price;
            $data->created_by                      = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Product  added successfully.');
        }
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
}