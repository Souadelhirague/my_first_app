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
    <i class="fas fa-plus"></i>Modifier le menu
</h3>

<form action="{{ route('menus.update',$menus->slug) }}" method="Post" enctype="multipart/form-data"  >
@csrf
@method('PUT')
<div class="form-group">
    <input type="text" name="title" id="title"
    class=form-control  placeholder="Titre"value="{{$menus->title}}">
</div>
<div class="form-group">
    <textarea name="description" id="description"
    class=form-control  placeholder="description"rows="5"cols="30" value="{{$menus->description}}"></textarea>
</div>
<div class="input-group mb-3">
 <div class="input-group-prepend">
    <div class="input-group-text">
    DH
</div>
 </div>
 <input type="number" name="price" class="form-control" placeholder="Prix" id="" value="{{$menus->price}}">
 <div class="input-group-append">
 <div class="input-group-text">
    .00
</div>
 </div>
</div>
<div class="my-2">
<!-- my:margine top et bottom -->
<img src="{{asset('images/menus/'.$menus->image)}}" alt="{{$menus->title}}" width="200"height="200"
class="img-fluid">

</div>
<div class="form-group">
    <select name="category_id" id="" class="form-control">
        @foreach ($categories as $category)
        <option {{$category->id === $menus->category_id ? "selected":" "}}   value="{{$category->id}}">{{$category->title}}</option>
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