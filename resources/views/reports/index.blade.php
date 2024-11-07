<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('accueil') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="d-flex flex-row justify-content-between
                             align-items-center border-bottom pb-1">
<h3 class="text-secondary ">
<i class="fas fa-bars-card"></i>
Rapports
</h3>
<a href="/payments" class="btn btn-outline-secondary">
<i class="fa fa-chevron-left fa-1x"></i>
</a>
                            </div>
 <div class="d-flex justify-content-center align-items-center my-3">
    <div class="col-sm-3 shadow mx-auto p-2">
    <div class="card-body">
        <div class="row">
            

           
<form id="show-report" action="{{route('reports.generate')}}" method="post">
    @csrf
<div class="form-group my-3"> 
<input type="date" name="from"  class="form-control"></div>
<div class="form-group my-3">  
<input type="date" name="to" class="form-control"></div> 
<div class="form-group my-3">
    <button class="btn btn-primary"
    onclick="event.preventDefault();
document.getElementById('show-report').submit();
    "
    >
Afficher le rapport
    </button>
</div>

</form>
</div>
</div>
    </div>
</div>
</div>
</div>
@isset($total)
<div class="text-primary">
    <h4>Rapport  de {{$startDate}}  à {{$endDate}} </h4>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">menus</th>
      <th scope="col">Tables</th>
      <th scope="col">Sérveur</th>
      <th scope="col">Quantité</th>
      <th scope="col">Total</th>
      <th scope="col">Type de paiement</th>
      <th scope="col">Etat de paiement</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sales as $sale)
    <tr>
      <th scope="row">{{$sale->id}}</th>
      <td >
        <div class="d-flex flex-column justify-content-center align-items-start">
          @foreach($sale->menus()->where('sales_id',$sale->id)->get() as $menu)  
     <div class="d-flex justify-content-center align-items-center mt-2 "> 
        <img src="{{asset('images/menus/'.$menu->image)}}" alt="{{$menu->title}}"
           class="fluid rounded ml-2" width="60"height="60">
            <span class="ml-2">{{$menu->title}}</span> </div>
        @endforeach  
        </div>
    </td>
      <td >
        <div class="d-flex flex-column justify-content-center align-items-start">
      @foreach($sale->tables()->where('sales_id',$sale->id)->get() as $table)
<span class="d-flex flex-column justify-content-between align-items-center mt-2 text-muted font-weight-bold">
                    {{$table->name}}
                </span>
@endforeach
</div>
      </td>
      <td>
         {{$sale->servant->name}} 
       
      </td>
      <td><div class="d-flex  justify-content-center align-items-center">{{$sale->quantity}}</div></td>
      <td ><div class="d-flex justify-content-center align-items-center"> {{$sale->total_price}}</div></td>
      <td ><div class="d-flex  justify-content-center align-items-center">{{$sale->payment_type==='cash'?'Espéce':'Carte bancaire'}}</div></td>
      <td ><div class="d-flex  justify-content-center align-items-center">{{$sale->payment_status==='paid'?'Payé':'Impayé'}}</div></td>
    </tr>
    @endforeach
  </tbody>
</table>

<p class="text-danger-center text-center font-weight-bold">
    <span class="border border-danger p-2">
    Total : {{$total}} DH   
    </span>
</p>
<form action="{{route('reports.export')}}" method="post">
@csrf
<div class="form-group my-3"> 
<input type="hidden" name="from"  value="{{$startDate}}"class="form-control"></div>
<div class="form-group my-3">  
<input type="hidden" name="to" value="{{$endDate}}"class="form-control"></div> 
<div class="form-group my-3">
    <button class="btn btn-danger"
    onclick="event.preventDefault();
document.getElementById('show-report').submit();
    "
    >
Génere le rapport excel
    </button>
</div>

</form>


@endisset

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





</x-app-layout>