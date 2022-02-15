<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->

        @if($product->category())
            <div class="categorias badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><i>{{$product->category->nombre}}</i></div>
        @endif
        <!-- Product image-->
        @if(!empty($product->imagenes[0]) )
        <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($product->imagenes as $key => $imagen)
                    @if($key === 0)
                        <div class="carousel-item active">
                    @else
                        <div class="carousel-item">
                    @endif
                    <img src="{{$imagen->img}}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            @if(count($product->imagenes) !== 1)
                <a class="carousel-control-prev" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            @endif
        </div>
        @else
                <img class="card-img-top" src="http://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
        @endif

        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"> {{$product->nombre}}</h5>
                <p>{{$product->descripcion}}</p>
                <p>{{$product->user->name}}</p>
                <p>{{$product->precio}}$</p>
                <a class="crud" href="/deleteProduct/{{$product->id}}"><i class="bi bi-trash"></i></a>
            </div>
        </div>
    </div>
</div>
