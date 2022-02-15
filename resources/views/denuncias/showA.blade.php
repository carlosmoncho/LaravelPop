@include('partials.header')

<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">Denuncia</h3>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <b>Producto</b>
                                <p>: {{$product->nombre}}</p>
                            </div>
                            <div class="media">
                                <b>Descripcion</b>
                                <p>: {{$product->descripcion}}</p>
                            </div>
                            <div class="media">
                                <b>Usuario</b>
                                <p>: {{$product->user->name}}</p>
                            </div>
                            <div class="media">
                                <b>Precio: </b>
                                <p>{{$product->precio}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-avatar">
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
                </div>
            </div>
        </div>
    </div>
</section>
<div class="fixed-bottom">
@include('partials.footer')
</div>
