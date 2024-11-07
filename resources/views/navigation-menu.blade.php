<div  class=" shadow-sm border-bottom">
<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<div class="container ">
        <!-- Logo -->
        <a class="navbar-brand me-4 " href="/categories">
        <img src="{{asset('./logo_image/'.'hamburger-logo.jpg')}}" alt="hamburger-logo"
      class="img-fluid rounded-circle" width="60"height="60"
      >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                    {{ __('HiragueResto') }}
                </x-nav-link> -->
                <a href="/categories" class="text-secondary outline-none" >HiragueResto</a>
            </ul>
            <div class="col-md-8">
                <div class="d-flex justify-content-center align-items-center">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
     data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/categories" 
          role="button"
           data-bs-toggle="dropdown" 
           aria-expanded="false">
            gestion
         </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/categories">Categories</a></li>
            <li><a class="dropdown-item" href="/menus">Menus</a></li>
            <li><a class="dropdown-item" href="/tables">tables</a></li>
            <li><a class="dropdown-item" href="/serveurs">serveurs</a></li>
          </ul> 
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/payments">Payments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reports">Rapport</a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>

</div>
</div>
 <!-- Right Side Of Navbar -->
<div class="dropdown">
  <button class="btn btn-transparent dropdown-toggle"  id="dropdownMenuButton2"
   data-bs-toggle="dropdown" aria-expanded="false">
  @auth

                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    <li><a class="dropdown-item " href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
    </a></li>
    <li>
    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
    <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                               
                            @endif
    </a></li>
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <li><a class="dropdown-item" href="#"> {{ Auth::user()->currentTeam->name }}
    
            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
             </svg>
            
    </a></li>@endif
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
    </a></li>
    @endauth  
</ul>
</div>
            
        </div>
    </div>
</nav> </div>
