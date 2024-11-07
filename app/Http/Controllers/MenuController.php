<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\Category;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Illuminate\Support\Str;
class MenuController extends Controller
{
public function __construct(){

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
        return view('managements.menus.index')
        ->with(['menus'=>menu::Paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('managements.menus.create')->with(['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremenuRequest $request)
    {
        //validation
        $validated = $request->validate([
            'title'=>'required|min:3|unique:menus,title',
            'description'=>'required|min:5',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'price'=>'required|numeric',
            'category_id'=>'required|numeric',
        ]);
        // dd($request->all());
//store data
 if($request->hasFile("image")){
$file=$request->image;
$imageName= time().'_'.$file->getClientOriginalName();
$file->move(public_path('images/menus'),$imageName);
$title = $request->title;
menu::create([
    "title"=>$title,
    "slug"=> Str::slug($title),
   "description"=>$request->description,
   "price"=> $request->price,
   "category_id"=>$request->category_id,
   "image"=> $imageName,
]);
//redirect user
return redirect()->route("menus.index")->with([
    'success'=>'menu ajouté avec succée',
]);
}


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(menu $menu)
    {
        //
        return view('managements.menus.edit')
        ->with(['categories'=>Category::all(),
    'menus'=>$menu
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemenuRequest  $request
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemenuRequest $request, menu $menu)
    {
//validation
$validated = $request->validate([
    'title'=>'required|min:3|unique:menus,title,$menu->id',
    'description'=>'required|min:5',
    'image'=>'image|mimes:png,jpg,jpeg|max:2048',
    'price'=>'required|numeric',
    'category_id'=>'required|numeric',
]);
//store data
        if($request->hasFile("image")){
            unlink(public_path('images/menus/'.$menu->image));
            $file=$request->image;
            $imageName= time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/menus'),$imageName);
            $title = $request->title;
            $menu->update([
                "title"=>$title,
                "slug"=> Str::slug($title),
               "description"=>$request->description,
               "price"=> $request->price,
               "category_id"=>$request->category_id,
               "image"=> $imageName,
            ]);

            //redirect user
            return redirect()->route("menus.index")->with([
                'success'=>'menu modifié avec succée',
            ]);
            }
     else{
            $title = $request->title;
            $menu->update([
                "title"=>$title,
                "slug"=> Str::slug($title),
               "description"=>$request->description,
               "price"=> $request->price,
               "category_id"=>$request->category_id,
            
            ]);
            return redirect()->route("menus.index")->with([
                'success'=>'menu modifié avec succée', ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
        //remove image
        unlink(public_path('images/menus/'.$menu->image));
        $menu->delete();
        return redirect()->route("menus.index")->with([
            'success'=>'menu modifié avec succée', ]);
    
    }}