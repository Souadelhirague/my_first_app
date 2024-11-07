<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="d-flex flex-row justify-content-between
                             align-items-center border-bottom pb-1">
<h3 class="text-secondary ">
<i class="fas fa-credit-card"></i>
 ventes
</h3>
<a href="/payments" class="btn btn-primary">
<i class="fas fa-plus fa-x2"></i>
</a>
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
      <th scope="col">Action</th>
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
        <!-- $sales->servant->name -->
        @foreach($servants as $servant)
            @if($sale->servant_id===$servant->id)
               {{$servant->name}}
            @endif
        @endforeach
      </td>
      <td><div class="d-flex  justify-content-center align-items-center">{{$sale->quantity}}</div></td>
      <td ><div class="d-flex justify-content-center align-items-center"> {{$sale->total_price}}</div></td>
      <td ><div class="d-flex  justify-content-center align-items-center">{{$sale->payment_type==='cash'?'Espéce':'Carte bancaire'}}</div></td>
      <td ><div class="d-flex  justify-content-center align-items-center">{{$sale->payment_status==='paid'?'Payé':'Impayé'}}</div></td>
      <td>
      <div class="d-flex  justify-content-between align-items-center">
        <a href="{{route('sales.edit',$sale->id)}}" class=" btn btn-warning ">
<i class="fas fa-edit fa-x2"></i>
</a>
<form id="{{$sale->id}}" action="{{route('sales.destroy',$sale->id)}}" method="post">
@csrf
@method('DELETE')
    <button 
    class="btn btn-danger" 
    onclick="
    event.preventDefault();
    if(confirm('voulez vous supprimer sale {{$sale->id}} ?'))
    document.getElementById({{$sale->id}}).submit()
    "
    
    >
        <i class="fas fa-trash"></i>
    </button>
</form>
</div>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
 <div class=" d-flex justify-content-center align-items-center ">{{ $sales->links()}}</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





</x-app-layout>