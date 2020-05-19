<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Category;
use App\BikeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
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
        
        // to get id from url
        if ($request->query('category_id')){
            $bikes = Bike::where("category_id", $request
                    ->query('category_id'))
                    ->orderBy('bikestatus_id', 'asc')
                    ->get();
        } else {
            $bikes = Bike::orderBy('bikestatus_id', 'asc')->get();
        }

        $categories = Category::all();

        return view('bikes.index')
            ->with('bikes', $bikes)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bike $bike)
    {
        $this->authorize('create', $bike);

        $statuses = BikeStatus::all();
        $categories = Category::all();
       
       
        return view('bikes.create')
            ->with('categories', $categories)
            ->with('statuses', $statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        //validation
        $validatedData = $request->validate([
            'model_code' => 'required|string',
            'category_id' => 'required|numeric',
            // 'bikestatus_id' => 'required|numeric',
            'image' => 'required|image|max:5000',
            'description' => 'required|string'
        ]);

    

        // $image_path = $request->file('image')->store('public/images');
        
        $file = $request->file('image');
        $name=time().$file->getClientOriginalName();
        $image_path = 'images/' . $name;
        Storage::disk('s3')->put($image_path, file_get_contents($file), 'public');

        // dd($image_path);

        $bike = new Bike($validatedData);

        //save bike model code with category id as prefix
        $bike->model_code = $validatedData['category_id']."-".$validatedData['model_code'];
        $bike->image = $image_path; 
        // dd($bike->image);
        $bike->bikestatus_id = 1;
        // dd($bike->category);

        $bike->save();

        return back();
        // return redirect(route('categories.show', ['category' => $bike->category_id]));
        // return view('bike.show')->with('message',"New bike added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        return view('bikes.show')->with('bike', $bike);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        $this->authorize('update', $bike);
        $statuses = BikeStatus::all();
        $categories = Category::all();

        return view('bikes.edit')
            ->with('categories', $categories)
            ->with('statuses', $statuses)
            ->with('bike', $bike);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike)
    {
        $this->authorize('update', $bike);
        // dd($request->all());
        //validation
        $validatedData = $request->validate([
            'model_code' => 'required|string',
            'category_id' => 'required|numeric',
            'bikestatus_id' => 'required|numeric',
            // 'image' => 'required|image|max:5000',
            'description' => 'required|string'
        ]);

        $bike->update($validatedData);

        if ($request->hasFile('image')){
           //save image to store('public/images') folder 
            // $image_path = $request->file('image')->store('public/images'); 

            //save to amazon
            $file = $request->file('image');
            $name=time().$file->getClientOriginalName();
            $image_path = 'images/' . $name;
            Storage::disk('s3')->put($image_path, file_get_contents($file), 'public');

            $bike->image = $image_path;
        }

        $bike->save();

        return redirect(route('categories.show', ['category' => $bike->category_id]))->with('message', "Product {$bike->name} Updated");
        // return back();
        // return redirect(route('bikes.index'))->with('message', "Product {$bike->name} Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        $this->authorize('delete', $bike);
        $bike->delete();
        return back();
    }

        // para mapalabas ung deleted sa softdelete, kelangan ng restore
    public function allCategories()
    {
        $this->authorize('viewAny', 'App\Category');
        $bikes = Bike::onlyTrashed()->get();
        $bike = Bike::all();

        return view('bikes.all-categories')
        ->with('bikes',$bikes);
    }

    public function restore($bike)
    {   
        $this->authorize('restore', 'App\Bike');
        Bike::withTrashed()->find($bike)->restore();
        return redirect('/bikes');
    }
}
