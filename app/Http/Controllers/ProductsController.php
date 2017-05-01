<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect ,Session ;

class ProductsController extends Controller
{
/*
* Display all data
*/
    public function index()
    {
        $data = Product::all();
        return view('vendor.adminlte.pages.sales.product')->with('data',$data);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:products'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Product;
    //      $data->product_categorie_id            = 1;
     //     $data->supplier_id                     = 1;
            $data->title                           = $request->title;
            $data->price                           = $request->price;
            $data->description                     = $request->description;
            $data->thumb                           = $request->thumb;
            $data->image                           = $request->image;
            $data->code                            = $request->code;
            $data->currency                        = $request->currency;
            $data->cost_price                      = $request->cost_price;
            $data->selling_price                   = $request->selling_price;
            $data->created_by                      = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Product  added successfully.');
        }
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Product::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:products'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = Product::find($id);
        //    $data->product_categorie_id            = $request->product_categorie_id;
      //      $data->supplier_id                     = $request->supplier_id;
            $data->title                           = $request->title;
            $data->price                           = $request->price;
            $data->description                     = $request->description;
            $data->thumb                           = $request->thumb;
            $data->image                           = $request->image;
            $data->code                            = $request->code;
            $data->currency                        = $request->currency;
            $data->cost_price                      = $request->cost_price;
            $data->selling_price                   = $request->selling_price;
            $data->updated_by                      = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','Product Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
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
