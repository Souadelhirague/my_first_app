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
                            
<h3 class="text-secondary border-bottom mb-3 p-2">
    <i class="fas fa-plus"></i>Ajouter un menu
</h3>

<form action="{{ route('menus.store') }}" method="Post" enctype="multipart/form-data"  >
@csrf
<div class="form-group">
    <input type="text" name="title" id="title"
    class=form-control  placeholder="Titre">
</div>
<div class="form-group">
    <textarea name="description" id="description"
    class=form-control  placeholder="description"rows="5"cols="30"></textarea>
</div>
<div class="input-group mb-3">
 <div class="input-group-prepend">
    <div class="input-group-text">
    DH
</div>
 </div>
 <input type="number" name="price" class="form-control" placeholder="Prix" id="">
 <div class="input-group-append">
 <div class="input-group-text">
    .00
</div>
 </div>
</div>
<div class="form-group">
    <select name="category_id" id="" class="form-control">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>

<div class="input-group mb-3">
 <div class="input-group-prepend">
    <span class="input-group-text">
   Image
</span>
</div>
 <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" >
    <label class="custom-file-label">2mg max</label>
  </div>
</div>

<div class="form-group mt-2">
    <button  class="btn btn-primary">
valider
    </button >
</div>

                            </form>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>





</x-app-layout>