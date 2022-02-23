@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tabla Denuncias Mensajes</h1>
    </div>
</div>
<section class="py-5">
    <div class="container ">
            <table class="table table-striped" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Usuario</th><th scope="col">Mensaje</th><th>Actions</th>
                </tr>
                </thead>
                @if(!empty($denuncias))
                    <tbody>
                    @foreach ($denuncias as $denuncia)
                        <tr>
                            <th scope="row">{{ $denuncia->id }}</th>
                            <td>{{ $denuncia->user->name }}</td>
                            <td>{{ $denuncia->mensaje->contenido }}</td>
                            <td>
                                <a class="crud" href="/deleteDenunciaM/{{ $denuncia->id }}/aceptada"><i class="bi bi-hand-thumbs-up"></i></a>
                                <a class="crud" href="/deleteDenunciaM/{{ $denuncia->id }}/NoAceptada"><i class="bi bi-hand-thumbs-down"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        <div class="d-flex justify-content-center">
            {{ $denuncias->links() }}
        </div>
    </div>
</section>

@include('partials.footer')
