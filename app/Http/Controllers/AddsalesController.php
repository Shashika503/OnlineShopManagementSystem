<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addsales;

class AddsalesController extends Controller
{
    public function store(Request $request){
        $addsales=new addsales;

        $this->validate($request,[
            'Invoiceid'=>'required|max:10|min:5',
            'customer'=>'required|max:10|min:5',
            ]);

        $addsales->invoiceid=$request->Invoiceid;
        $addsales->customer=$request->customer;
	    $addsales->totalamount=$request->totamount;
        $addsales->paymentmethod=$request->paymentmethod;
        $addsales->payterm=$request->payterm;
	    $addsales->paymentstatus=$request->paymentstatus;
        $addsales->sellstatus=$request->sellstatus;
        $addsales->save();
        $data=addsales::all();//getting all data from addsales table to data variable to display
        //dd($request->all()); 
        return view('Sales/viewsales')->with('viewsales1',$data );  //return addsales view with data to display
    }
}
