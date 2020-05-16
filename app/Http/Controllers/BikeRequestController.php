<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Bike;
use Auth;

class BikeRequestController extends Controller
{
    public function __construct()
    {   
        //if guest or not logged in, redirect to login page
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

    // dd(Session::get('data'));
    // array_unique to delete duplicates in session
    if (Session::has('data')){
    $array = array_unique(Session::get('data'));
    // once delete, update the session data
    Session::put('data', $array);
    }

    //query to fetch data stored in session
    $bikes = Bike::find(Session::get('data'));
    // dd($bikes);

    

    return view('bikerequests.index')
        ->with('bikes', $bikes);

    }
// 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
    public function update(Request $request, $bikerequest)
    {
        // dd($bikerequest);
        //upon request button click, lagay si data sa session using bikerequest --> galing to sa slug ng update
        // $request->session()->put('data',[$bikerequest]);  //put for single data kasi hindi siya nadadagdagan sa array

        // $request->session()->put('data.$id',$bikerequest);

        // if (Session::has('data')){
            $request->session()->push('data',$bikerequest); //push for multiple data para array

            // array_unique to delete duplicates in session
            if (Session::has('data')){
                $array = array_unique(Session::get('data'));
            // once deleted, update the session data
                Session::put('data', $array);
            }
        // } 
            
        return back();
        // return redirect(route('bikerequests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $array = Session::get('data');
        // dd($array);

        foreach($array as $key => $data_id){
            if ($id == $data_id){
                // dd('testing kung papasok');
                unset($array[$key]);

            }
        }

        //place new array to session
        Session::put('data', $array);


        // return $array;
        // dd(Session::get('data'));
        // Session::forget('$id');
        // dd(Session::forget($id));
        if (count(Session::get('data')) === 0){
            $this->clear(); //to get clear method
        }

        return redirect(route('bikerequests.index'));

    }

    public function clear()
    {
        Session::forget('data');

        return redirect(route('bikerequests.index'));
    }
}
