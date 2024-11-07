<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HiragueResto</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/categories') }}" class="text-muted">home</a></div></div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center align-items-center p-3">
                                <div class="card">
                                    <div class="card-body shadow mx-auto p-2 bg-light width-300 height-300" >
                            <ul class="list-group mb-3">
    <a href="/payments" class="list-group-item font-weight-bold
                  list-group-item-action 
                 list-group-item-light mb-3 ">
                 <i class="fa-solid fa-receipt"></i>
                 payments
                </a>
                 <a href="/reports" class="list-group-item font-weight-bold
                  list-group-item-action 
                 list-group-item-light mb-3">
                 <i class="fa-regular fa-clipboard"></i>
                 Rapport</a>
                 <a href="/categories" class="list-group-item font-weight-bold
                  list-group-item-action 
                 list-group-item-light mb-3"  >
                 <i class="fa-solid fa-list-check"></i>
                gestion</a>
                
                 
</ul>

</div>
                                </div>
                            </div></div>

                        @else
                            <a href="{{ route('login') }}" class="text-muted">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

   
                </div>
            </div>
        </div>
    </div>
</body>
</html>
