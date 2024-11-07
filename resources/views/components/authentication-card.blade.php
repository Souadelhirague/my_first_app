<!-- <div class="min-h-screen 
flex flex-col 
sm:justify-center
 items-center pt-6 
 sm:pt-0 bg-gray-100"> -->
 <div class="col-md-12">
<div class="d-flex flex-column justify-content-center
align-items-center p-3 bg-gray-100 m-100 p-2">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
 </div>