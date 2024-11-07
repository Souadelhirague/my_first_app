<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Servants;
use App\Models\table;
class PaymentController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
  }
  public function index(){ 
return view('payments.index')->with([
'tables'=>table::all(),
'categories'=>Category::all(),
'servants'=>Servants::all(),
]);} 
}
