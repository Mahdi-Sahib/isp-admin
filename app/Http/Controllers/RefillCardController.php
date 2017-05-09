<?php

namespace App\Http\Controllers;

use App\RefillCard;
use App\Supplier;
use Yajra\Datatables\Facades\Datatables;
use Validator, Input, Redirect ,Session ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RefillCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('vendor.adminlte.pages.sales.refill_cards.refill_cards',compact('suppliers'));
    }

    public function RefillCardsTableAjax()
    {
        $refillcards = RefillCard::with('supplier','user')->select('refill_cards.*');
        return Datatables::of($refillcards)
            ->orderBy('created_at', 'id $1')

            ->addColumn('action', function ($refillcards) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal" onclick="fun_view('.$refillcards->id.')">Peek</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal" onclick="fun_edit('.$refillcards->id.')">Edit</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
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
     * @param  \App\RefillCard  $refillCard
     * @return \Illuminate\Http\Response
     */
    public function show(RefillCard $refillCard)
    {
        //
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Product::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefillCard  $refillCard
     * @return \Illuminate\Http\Response
     */
    public function edit(RefillCard $refillCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefillCard  $refillCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefillCard $refillCard)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:refill_cards'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = RefillCard::find($id);
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
            $data -> save();
            return back()
                ->with('success','Product Updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefillCard  $refillCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefillCard $refillCard)
    {
        //
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Product::find($id);
        $response = $data -> delete();
        if($response)
            echo "Product Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}
