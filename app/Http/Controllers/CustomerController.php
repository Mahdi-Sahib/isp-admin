<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use App\AddressHelper;
use App\ConnectionType;
use App\Device;
use App\Tower;
use App\CustomerTicket;
use App\Broadcast;
use App\Ticket;
use App\FiberBox;
use App\FiberNode;
use Validator, Input, Redirect ,Session ;




class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.adminlte.pages.customer.customers-table-one');
    }


    public function CustomerTableOneView()
    {
        return view('vendor.adminlte.pages.customer.customers-table-one');
    }

    public function CustomerTableOneAjax()
    {
        $customers = Customer::select('customers.*');
        return Datatables::of($customers)
            ->orderBy('created_at', 'id $1')
            ->editColumn('connection_method',function ($customers){
                if ($customers->connection_method == 1){
                    return "Unknown!" ;
                }elseif ($customers->connection_method == 2){
                    return "Wireless" ;
                }elseif ($customers->connection_method == 3){
                    return "LAN" ;
                }elseif ($customers->connection_method == 4){
                    return "Fiber Obtic";
                }
            })
            ->addColumn('action', function ($customers) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_fullview_customer('.$customers->id.')">Peek</a></li>
                            <li><a href="'.$customers->id.'">View</a></li>
                            <li><a href="customers/'.$customers->id.'/edit">Edit</a></li>
                            <li><a href="" data-toggle="modal" data-target="#close_message" onclick="fun_customer_ticket('.$customers->id.')">Ticket</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
    }


    public function CustomersTableTwoAjax()
    {
        $customer = Customer::with('tower','broadcast')->select('customers.*');
        return Datatables::of($customer)

            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer           = Customer::all();
        $towers             = Tower::all();
        $broadcast          = Broadcast::all();
        $connection_types   = ConnectionType::all();
        $device             = Device::all();
        $address            = AddressHelper::all();
        $apmac              = Broadcast::all();
        return view('vendor.adminlte.pages.customer.new-customer' , compact('customer','device','towers','broadcast','address','apmac','connection_types'));
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
            'fullname'       => 'required|unique:customers',
            'username'       => 'required|unique:customers',
            'mobile_1'       => 'required|numeric',
            'mobile_2'       => 'numeric',
            'address_2'      => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('isp-cpanel/customers/create')
                ->withErrors($validator)
                ->withInput();
        }else {

            // store
            $customer = new Customer;
            $customer->fullname           = $request->fullname;
            $customer->username           = $request->username;
            $customer->mobile_1           = $request->mobile_1;
            $customer->mobile_2           = $request->mobile_2;
            $customer->address_1          = $request->address_1;
            $customer->address_2          = $request->address_2;
            $customer->about              = $request->about;
            $customer->mac                = $request->mac;
            $customer->ip                 = $request->ip;
            $customer->device_id          = $request->device_id;
            $customer->broadcast_id       = $request->broadcast_id;
            $customer->tower_id           = $request->tower_id;
            $customer->apmac_id           = $request->apmac_id;
            $customer->fiberbox_id        = $request->fiberbox_id;
            $customer->switch_id          = $request->switch_id;
            $customer->connection_method  = $request->connection_method;
            $customer->created_by         = Auth::User()->id;
            $customer->save();

            // redirect
            Session::flash('message','Successfuly Add ' . $customer->fullname. ' !' ) ;

            return redirect('isp-cpanel/customers');

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
        $tower              = Tower::all();
        $broadcast          = Broadcast::all();
        $device             = Device::all();
        $apmac              = Broadcast::all();
        $ticket             = CustomerTicket::all();
        $fiberbox           = FiberBox::all();
        $fibernode          = FiberNode::all();
        $customer           = Customer::find($id);
        return view('vendor.adminlte.pages.customer.view-customer' , compact('customer','device','tower','broadcast','apmac','ticket','user','fiberbox','fibernode')) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tower       = Tower::all();
        $broadcast   = Broadcast::all();
        $device      = Device::all();
        $apmac       = Broadcast::all();
        $fiberbox           = FiberBox::all();
        $fibernode          = FiberNode::all();
        $customer    = Customer::find($id);
        return view('vendor.adminlte.pages.customer.edit-customer' , compact('customer','device','tower','broadcast','apmac','fiberbox','fibernode')) ;
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
            $customer = Customer::find($id);
            $customer->fullname      = $request->fullname;
            $customer->username      = $request->username;
            $customer->mobile_1      = $request->mobile_1;
            $customer->mobile_2      = $request->mobile_2;
            $customer->address_1     = $request->address_1;
            $customer->address_2     = $request->address_2;
            $customer->about         = $request->about;
            $customer->mac           = $request->mac;
            $customer->ip            = $request->ip;
            $customer->device_id     = $request->device_id;
            $customer->broadcast_id  = $request->broadcast_id;
            $customer->tower_id      = $request->tower_id;
            $customer->apmac_id      = $request->apmac_id;
            $customer->updated_by    = Auth::User()->id;
            $customer->save();
            Session::flash('message','Successfuly updated ' . '( ' . $customer->fullname . ' )' . ' ! ' );
            return Redirect::to('isp-cpanel/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->destroy($id);
        Session::flash('message','Successfuly deleted ' . $customer->fullname.' !');
        return Redirect::to('isp-cpanel/customers');
    }
}
