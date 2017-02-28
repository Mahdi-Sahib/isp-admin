<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\TowerTicket;

class TowerTicketController extends Controller
{
    public function ticketTable(){
        $tower_tickets = TowerTicket::select('tower_tickets.*');
        return Datatables::of($tower_tickets)

            ->addColumn('action', function ($customer) {
                return '<a href="customer/'.$customer->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="customer/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a>
                ';

            })
            
            ->make(true);
    }





}
