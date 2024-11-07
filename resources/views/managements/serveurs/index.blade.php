<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('accueil') }}
        </h2>
    </x-slot>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        @include('layouts.sidebar')
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between
                             align-items-center border-bottom pb-1">
<h3 class="text-secondary ">
    <i class="fas fa-user-cog"></i>Serveurs
</h3>
<a href="{{route('serveurs.create')}}" class="btn btn-primary">
<i class="fas fa-plus fa-x2"></i>
</a>
                            </div>
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom & Prénom</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($servants as $serveur)
    <tr>
      <th scope="row">{{$serveur->id}}</th>
      <td>{{$serveur->name}}</td>
      <td>
      @if($serveur->adress) 
      {{$serveur->adress}}
      @else 
      <span class="text-danger">
        Non disponible
      </span> 
     @endif </td>
      <td class="d-flex flex-row justify-content-between align-items-center" >
        <a href="{{route('serveurs.edit',$serveur->id)}}" class="btn btn-warning">
<i class="fas fa-edit fa-x2"></i>
</a>

<form id="{{ $serveur->id}}" action="{{route('serveurs.destroy',$serveur->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button 
    onclick="
    event.preventDefault();
    if(confirm('Voulez vous supprimer la serveur {{$serveur->name }} ?')) 
    document.getElementById({{$serveur->id}}).submit()
    "
    class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
 <!-- <div class=" d-flex justify-content-center align-items-center ">{{ $servants->links()}}</div> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





</x-app-layout>