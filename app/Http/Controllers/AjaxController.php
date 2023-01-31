<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class AjaxController extends Controller
{
    public function ajaxFetch(Request $req){
        return response()->json(Payment::find($req->id));
    }
}
