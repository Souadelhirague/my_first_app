<table >
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
        <div >
          @foreach($sale->menus()->where('sales_id',$sale->id)->get() as $menu)  
            <span >{{$menu->title}}</span> </div>
        @endforeach  
        </div>
    </td>
      <td >
        <div 
      @foreach($sale->tables()->where('sales_id',$sale->id)->get() as $table)
<span >
                    {{$table->name}}
                </span>
@endforeach
</div>
      </td>
      <td>
        <!-- {{$sale->servant->name}} -->
        @foreach($servants as $servant)
            @if($sale->servant_id===$servant->id)
               {{$servant->name}}
            @endif
        @endforeach
      </td>
      <td>{{$sale->quantity}}</div></td>
      <td > {{$sale->total_price}}</div></td>
      <td >{{$sale->payment_type==='cash'?'Espéce':'Carte bancaire'}}</div></td>
      <td >{{$sale->payment_status==='paid'?'Payé':'Impayé'}}</div></td>
    </tr>
    @endforeach
  </tbody>
</table>