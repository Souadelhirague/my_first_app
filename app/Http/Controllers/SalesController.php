<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Http\Requests\StoresalesRequest;
use App\Http\Requests\UpdatesalesRequest;
use App\Models\Servants;
class SalesController extends Controller
{
public function __construct(){
    $this->middleware("auth");
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales=sales::paginate(10);
        $servants=Servants::all();
        return view('sales.index')->with([
"sales"=>$sales,"servants"=>$servants

        ]);
        
    }
// OrederBy("created_at","DESC")->
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
     * @param  \App\Http\Requests\StoresalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalesRequest $request)
    {
        //
     $this->validate(
            $request,[
'table_id'=>'required',
'menu_id'=>'required',
'servant_id'=>'required',
'quantity'=>'required|numeric',
'total_price'=>'required|numeric',
'total_received'=>'required|numeric',
'change'=>'required|numeric',
'payment_status'=>'required',
'payment_type'=>'required',
 ]);
//   dd($request->all());
$sale = new  sales();
$sale->servant_id = $request->servant_id;
$sale->quantity =$request->quantity;                   
$sale->total_price =$request->total_price;
$sale->total_received = $request->total_received;
$sale->change = $request->change;
$sale->payment_type = $request->payment_type;
$sale->payment_status  = $request->payment_status;
$sale->save();
$sale->menus()->sync($request->menu_id);
$sale->tables()->sync($request->table_id);
//redirect user
return redirect()->back()->with([
    'success'=>'paiement effecué avec succés'
]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get sale to update
        $sales=sales::findOrFail($id);
        //get sale tables
        $tables=$sales->tables()->where('sales_id',$sales->id)->get();
        //get table menus
        $menus= $sales->menus()->where('sales_id',$sales->id)->get();
        
        return view('sales.edit')->with(['tables'=> $tables,'menus'=> $menus,
        'sale'=>$sales,'servants'=>Servants::all()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesalesRequest  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesalesRequest $request, $id)
    {
        //
     
        $this->validate(
            $request,[
'table_id'=>'required',
'menu_id'=>'required',
'servant_id'=>'required',
'quantity'=>'required|numeric',
'total_price'=>'required|numeric',
'total_received'=>'required|numeric',
'change'=>'required|numeric',
'payment_status'=>'required',
'payment_type'=>'required',
 ]);
//   dd($request->all());

//get sale to update
 $sale=sales::findOrFail($id)  ;
//update data 
$sale->servant_id = $request->servant_id;
$sale->quantity =$request->quantity;                   
$sale->total_price =$request->total_price;
$sale->total_received = $request->total_received;
$sale->change = $request->change;
$sale->payment_type = $request->payment_type;
$sale->payment_status  = $request->payment_status;
$sale->update();
$sale->menus()->sync($request->menu_id);
$sale->tables()->sync($request->table_id);
//redirect user
return redirect()->back()->with([
    'success'=>'paiement modifié avec succés'
]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get sale to update
        $sale=sales::findOrFail($id);
        //delete sales
        $sale->delete();
        //redirect user
        return redirect()->back()->with([
            'success'=>"Paiment supprimé avec succé"
        ]);

    }
}
