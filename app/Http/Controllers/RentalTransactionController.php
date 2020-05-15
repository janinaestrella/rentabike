<?php

namespace App\Http\Controllers;

use App\RentalTransaction;
use App\Bike;
use App\RentalStatus;
use Illuminate\Http\Request;
use Session;
use Auth;
use Str;

class RentalTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('rentaltransactions.index');
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
        $validatedData = $request->validate([
            'pickup_date' => 'required|date',
            'return_date' => 'required|date'
            ]);

        // 1. add dates, code and user id to rentaltransaction table
        $user_id = Auth::user()->id;  //to get user_id from Auth
        $code =  $user_id . strtoupper(Str::random(6));  //for generating random code
   
        $rentaltransaction = new RentalTransaction([
            'code' => $code,
            'user_id' => $user_id,
            'pickup_date' => $validatedData['pickup_date'],
            'return_date' => $validatedData['return_date']    
        ]);

        // dd($rentaltransaction);
        $rentaltransaction->save();

        // dd(Session::get('data'));
        // 2. add entries to pivot table : bike_rental_transactions table (session based)
        //     get the key/id from session
            $array = Session::get('data');
            foreach($array as $key => $data_id){
        //     query to database to get the price of the collected product based on ids
                    $bike = Bike::find($data_id);
                    
        //     for every products listed in cart, add them in the pivot table :     bike_rental_transactions table 
                    // $rentaltransaction->bikes()->attach($bike->id);
                    // $rentaltransaction->save();
                    
            }


        //     price, subtotal, quantity

        

        
        // Session::forget('cart');
        return  redirect(route('rentaltransactions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentalTransaction $rentalTransaction)
    {
        //
    }
}
