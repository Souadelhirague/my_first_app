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
    <i class="fas fa-plus"></i>Ajouter un serveur
</h3>
                           
<form action="{{ route('serveurs.store') }}"method="Post">
@csrf
<div class="form-group">
    <input type="text" name="name" id="name"
    class=form-control  placeholder="Nom & Prénom">
</div>
<div class="form-group">
    <input type="text" name="adress" id="adress"
    class=form-control  placeholder="Address">
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