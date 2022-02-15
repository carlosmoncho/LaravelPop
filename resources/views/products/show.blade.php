@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Productos de {{$user->name}}</h1>
    </div>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($products as $product)
                @include('products.card')
            @endforeach
        </div>
    </div>
</section>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>

@include('partials.footer')
