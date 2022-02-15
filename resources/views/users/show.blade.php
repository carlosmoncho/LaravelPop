@include('partials.header')

<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">{{$user->name}}</h3>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <b>User Id</b>
                                <p>: {{$user->id}}</p>
                            </div>
                            <div class="media">
                                <b>Email: </b>
                                <p>{{$user->email}}</p>
                            </div>
                            <div class="media">
                                <iframe src="{{$user->ubicacion}}" style="margin-bottom:20px;  width:200px; height:250px;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-avatar">
                    <img src="{{$user->img}}" style="height: 300px; width: 300px;">
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">{{count($user->producto)}}</h6>
                        <p class="m-0px font-w-600">Productos</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">{{count($user->productosComprados)}}</h6>
                        <p class="m-0px font-w-600">Productos Comprados</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">{{count($user->denunciasM)+count($user->denunciasA)}}</h6>
                        <p class="m-0px font-w-600">Denuncias</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        @if(empty($user->valoracion->avg('valoracion')))
                            <p class="count" data-to="190" data-speed="190">No tiene valoraciones</p>
                        @else
                            <h6 class="count h2" data-to="190" data-speed="190">{{$user->valoracion->avg('valoracion')}}</h6>
                        @endif
                        <p class="m-0px font-w-600">Valoracion</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@include('partials.footer')
