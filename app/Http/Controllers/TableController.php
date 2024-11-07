<?php

namespace App\Http\Controllers;

use App\Models\table;
use App\Http\Requests\StoretableRequest;
use App\Http\Requests\UpdatetableRequest;
use Illuminate\Support\Str;
class TableController extends Controller
{
    public function  __construct(){

        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('managements.tables.index')->with(["tables"=>table::Paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('managements.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretableRequest $request)
    {
        //
        //validation
        $validated = $request->validate([
            'name'=>'required|unique:tables,name',
            'status'=>'required|boolean'
        ]);
        // $this->validate($request,['title'=>'required|min:3']);
//store data
$name = $request->name;
table::create([
    "name"=>$name,
    "slug"=> Str::slug($name),
    "status"=>$request->status,
   
]);
//redirect user
return redirect()->route("tables.index")->with([
    'success'=>'la table ajoutée avec succée',
]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(table $table)
    {
        //
        return view('managements.tables.edit')->with([
            'table'=>$table,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetableRequest  $request
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetableRequest $request, table $table)
    {
        //
         //validation
         $validated = $request->validate([
            'name'=>"required|unique:tables,name,$table->id",
            'status'=>'required|boolean',
        ]);
        $name=$request->name;
        $table->update([
             'name'=>$name,
             'slug'=>Str::slug($name),
             'status'=>$request->status,
        ]);
        //redirect user
        return redirect()->route('tables.index')
        ->with(['success'=>"table modifier avec succés"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(table $table)
    {
        //
                // delete category
                $table->delete();
                //redirect user
                return redirect()->route('tables.index')
                ->with(['success'=>"la table supprimée avec succés"]);
    }
}
