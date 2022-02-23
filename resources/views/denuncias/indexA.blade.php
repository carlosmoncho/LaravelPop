@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tabla Denuncias Productos</h1>
    </div>
</div>
<section class="py-5">
    <div class="container">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Usuario Denunciado</th><th>Producto</th><th>Actions</th>
                </tr>
                </thead>
                @if(!empty($denuncias))
                    <tbody>
                    @foreach ($denuncias as $denuncia)
                        <tr>
                            <td>{{ $denuncia->id }}</td>
                            <td>{{ $denuncia->user->name }}</td>
                            <td>{{ $denuncia->product->nombre }}</td>
                            <td>
                                <a class="crud" href="/deleteDenunciaA/{{ $denuncia->id }}/aceptada"><i class="bi bi-hand-thumbs-up"></i></a>
                                <a class="crud" href="/deleteDenunciaA/{{ $denuncia->id }}/NoAceptada"><i class="bi bi-hand-thumbs-down"></i></a>
                                <a class="crud" href="{{route('denunciaA.show', $denuncia->product->id)}}"><i class="bi bi-eye"></i></a>
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
