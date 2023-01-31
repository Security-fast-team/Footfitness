<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // All payment data show page
    public function index(){
        $payment = Payment::all();
        return view('backend.pages.payment.index', compact('payment'));
    }

    // Insert payment data page show
    public function create(){
        return view('backend.pages.payment.create');
    }

    // Insert payment data
    public function insert(Request $request){
        $request->validate([
            'payment' => 'required',
            'status' => 'required',
        ]);

        $payment = new Payment();

        $payment->payment = $request->payment;
        $payment->description = $request->description;
        $payment->status = $request->status;

        $payment->save();
        return redirect()->route('payment.index')->with('message', 'Payment system added successfully!');
    }

    // Payment system data delete
    public function payment_delete($id){
        $payment = Payment::find($id);

        $payment->delete();
        return redirect()->back()->with('message', 'Payment system data deleted successfully!');
    }

    public function edite($id){
        $payment = Payment::find($id);
        return view('backend.pages.payment.edite', compact('payment'));

    }

    public function update(Request $request, $id){
        $payment = Payment::find($id);

        $payment->payment = $request->payment;
        $payment->description = $request->description;
        $payment->status = $request->status;

        $payment->save();
        return redirect()->route('payment.index')->with('message', 'Payment system update successfully!');
    }
}
