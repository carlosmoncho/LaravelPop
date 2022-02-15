@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Mensajes de {{$user->name}}</h1>
    </div>
</div>
<section class="py-5">
    <div class="row justify-content-center">
        <h5>Mensajes enviados</h5>
    </div>
    @if(!$mensajes->isEmpty())
    <div class="container px-4 px-lg-5 mt-5">
            <table class="table" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Contenido</th><th scope="col">Receptor</th><th>Actions</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach ($mensajes as $mensaje)
                        <tr>
                            <td>{{ $mensaje->id }}</td>
                            <td>{{ $mensaje->contenido }}</td>
                            <td>{{ $mensaje->receptor->name }}</td>
                            <td>
                                <a class="crud" href="/deleteMensaje/{{$mensaje->id}}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <p class="row justify-content-center">No tiene mensajes</p>
                @endif
            </table>
        <div class="d-flex justify-content-center">
            {{ $mensajes->links() }}
        </div>
    </div>
</section>

<section class="py-5">
    <div class="row justify-content-center">
        <h5>Mensajes recibidos</h5>
    </div>
    @if(!$mensajesRecibidos->isEmpty())
        <div class="container px-4 px-lg-5 mt-5">
                <table class="table" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Contenido</th><th scope="col">Emisor</th><th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($mensajesRecibidos as $mensajeRecibido)
                        <tr>
                            <td>{{ $mensajeRecibido->id }}</td>
                            <td>{{ $mensajeRecibido->contenido }}</td>
                            <td>{{ $mensajeRecibido->emisor->name }}</td>
                            <td>
                                <a class="crud" href="/deleteProduct/{{$mensajeRecibido->id}}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @else
                        <p class="row justify-content-center">No tiene mensajes</p>
                    @endif
                </table>
            <div class="d-flex justify-content-center">
                {{ $mensajesRecibidos->links() }}
            </div>
        </div>
</section>

@include('partials.footer')
