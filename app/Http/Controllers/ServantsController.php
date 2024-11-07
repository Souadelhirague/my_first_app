<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use App\Http\Requests\StoreServantsRequest;
use App\Http\Requests\UpdateServantsRequest;
use Illuminate\Support\Str;
class ServantsController extends Controller
{
  public function __construct()
  {
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
        return view('managements.serveurs.index')
        ->with(['servants'=>Servants::Paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('managements.serveurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServantsRequest $request)
    {
        //
        //validation
        $validated = $request->validate([
            'name'=>'required|min:3',
            'adress'=>'required',
        ]);
//store data
$name = $request->name;
$adress=$request->adress;
Servants::create([
    "name"=>$name,
    "adress"=>$adress ,
   
]);
//redirect user
return redirect()->route("serveurs.index")->with([
    'success'=>'serveur ajouté avec succée',
]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('managements.serveurs.edit')->with([
            'serveur'=>Servants::FindOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServantsRequest  $request
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServantsRequest $request, $id)
    {
        //
        $servants=Servants::FindOrFail($id);
        $name=$request->name;
        $servants->update([
             'name'=>$name,
             'adress'=>$request->adress,
        ]);
        //redirect user
        return redirect()->route('serveurs.index')
        ->with(['success'=>"serveur modifier avec succés"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $servants=Servants::FindOrFail($id);
        $servants->delete();
        //redirect user
        return redirect()->route('serveurs.index')->with(["success"=>"le  serveur supprimé avec succé"]);
    }
}
