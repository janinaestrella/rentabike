<?php

namespace App\Http\Controllers;

use App\Category;
use App\Bike;
use Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function index()
    {
        
        $categories = Category::orderBy('name','asc')->get();
        // $bikes = Bike::all();

        return view('categories.index')
            ->with('categories', $categories);
            // ->with('bikes', $bikes);
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
        //validation
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|string'
        ]);

        $category = new Category($validatedData); 
        $category->save();

        return redirect(route('categories.index'))->with('message', "{$category->name} was added succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        $bike = Bike::all();
        $bike->model_code = strtoupper(Str::random(6));
        
        // count all items in a category
        $totalcount = count($category->bikes);

        // get all bikestatus id 1(available) where category_id is equal to category id
        $availablebikes = Bike::where('bikestatus_id', 1)
                            ->where('category_id', $category->id)->count();

        //to get the items per category
        $bikepercategory = Bike::where('category_id', $category->id)->get();
        

        return view('categories.show')
            ->with('category', $category)
            ->with('bike', $bike)
            ->with('totalcount', $totalcount)
            ->with('availablebikes', $availablebikes)
            ->with('bikepercategory', $bikepercategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|string'
            ]);

        $category->update($validatedData);

        return redirect(route('categories.index'))->with('message', "{$category->name} was updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return redirect(route('categories.index'))->with('message', "{$category->name} was deleted succesfully"); 
    }

    // para mapalabas ung deleted sa softdelete, kelangan ng restore
    public function allCategories()
    {
        $this->authorize('viewAny', 'App\Category');
        $categories = Category::onlyTrashed()->get();
        $bike = Bike::all();

        return view('categories.all-categories')
        ->with('categories',$categories);
        // ->with('bike', $bike);
    }

    public function restore($category)
    {   
        $this->authorize('restore', 'App\Category');
        Category::withTrashed()->find($category)->restore();
        return redirect('/categories');
    }

}
