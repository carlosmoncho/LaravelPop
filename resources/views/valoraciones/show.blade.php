@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Valoraciones de {{$user->name}}</h1>
    </div>
</div>
<section class="py-5">
    <div class="row justify-content-center">
        <h5>Valoraciones echas</h5>
    </div>
    @if(!$valoracionesEchas->isEmpty())
    <div class="container px-4 px-lg-5 mt-5">
            <table class="table"  >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Comentario</th><th scope="col">Receptor</th><th scope="col">Valoraciones</th><th>Actions</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach ($valoracionesEchas as $valoracionEcha)
                        <tr>
                            <td>{{ $valoracionEcha->id }}</td>
                            <td>{{ $valoracionEcha->comentario }}</td>
                            <td>{{ $valoracionEcha->receptor->name }}</td>
                            <td>
                                @for($i=0;$i<$valoracionEcha->valoracion;$i++)
                                <a class="bi bi-star"></a>
                                @endfor
                            </td>
                            <td>
                                <a class="crud" href="/deleteProduct/{{$valoracionEcha->id}}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <p class="row justify-content-center">No tiene mensajes</p>
                @endif
            </table>
        <div class="d-flex justify-content-center">
            {{ $valoracionesEchas->links() }}
        </div>
    </div>
</section>

<section class="py-5">
    <div class="row justify-content-center">
        <h5>Valoraciones recibidas</h5>
    </div>
    @if(!$valoracionesRecibidas->isEmpty())
        <div class="container px-4 px-lg-5 mt-5">
                <table class="table" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Contenido</th><th scope="col">Valorador</th><th scope="col">Valoraciones</th><th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($valoracionesRecibidas as $valoracionRecibida)
                        <tr>
                            <td>{{ $valoracionRecibida->id }}</td>
                            <td>{{ $valoracionRecibida->comentario }}</td>
                            <td>{{ $valoracionRecibida->valorador->name }}</td>
                            <td>
                                @for($i=0;$i<$valoracionRecibida->valoracion;$i++)
                                <a class="bi bi-star"></a>
                                @endfor
                            </td>
                            <td>
                                <a class="crud" href="/deleteProduct/{{$valoracionRecibida->id}}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @else
                        <p class="row justify-content-center">No tiene mensajes</p>
                    @endif
                </table>
            <div class="d-flex justify-content-center">
                {{ $valoracionesRecibidas->links() }}
            </div>
        </div>
</section>

@include('partials.footer')
