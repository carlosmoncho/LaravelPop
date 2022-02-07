 @include('partials.header')
 <div class="container">
     <div class="row justify-content-center">
         <h1>Bienvenido {{Auth::user()->name}}</h1>
     </div>
 </div>
 <div class="fixed-bottom">
     @include('partials.footer')
 </div>

