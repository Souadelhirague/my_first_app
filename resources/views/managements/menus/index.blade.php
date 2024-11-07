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
<i class="fas fa-clipboard-list"></i>
Menu
</h3>
<a href="{{route('menus.create')}}" class="btn btn-primary">
<i class="fas fa-plus fa-x2"></i>
</a>
                            </div>
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">titre</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th scope="col">Categorie</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $menu)
    <tr class=" align-items-center">
      <th scope="row">{{$menu->id}}</th>
      <td >{{$menu->title}}</td>
      <td >{{substr($menu->description,0,100)}}</td>
      <td >{{$menu->price}} DH</td>
      <td >{{$menu->category->title}}</td>
      <td ><img src="{{asset('images/menus/'.$menu->image)}}" alt="{{$menu->title}}"
      class="fluid rounded" width="60"height="60"
      ></td>
      <td>
        <div class="d-flex  justify-content-between align-items-center">
        <a href="{{route('menus.edit',$menu->slug)}}" class="btn btn-warning">
<i class="fas fa-edit fa-x2"></i>
</a>
<form id="{{ $menu->id}}" action="{{route('menus.destroy',$menu->slug) }}" method="post">
    @csrf
    @method('DELETE')
    <button 
    onclick="
            event.preventDefault();
           if(confirm('Voulez vous supprimer le menu{{$menu->title }} ?')) 
           document.getElementById({{$menu->id}}).submit()
         " class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form></div>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
 <div class=" d-flex justify-content-center align-items-center ">{{ $menus->links()}}</div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





</x-app-layout>