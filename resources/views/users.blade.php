@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tabla Usuarios BatoiPOP</h1>
    </div>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <table class="table" style=" width: 200px;" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Name</th><th>Actions</th><th></th><th></th><th></th>
                </tr>
                </thead>
                @if(\PHPUnit\Framework\isEmpty($users))
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td><button type="button" class="btn btn-danger" href="/delete/{{ $user->id }}">Eliminar</button> <a href="/delete/{{ $user->id }}"><i class="bi bi-trash"></i> dsadds</a></td>
                            <td><button type="button" class="btn btn-light" href="/delete/{{ $user->id }}">Productos</button></td>
                            <td><button type="button" class="btn btn-success" href="/delete/{{ $user->id }}">Comentarios</button></td>
                            <td><button type="button" class="btn btn-warning" href="/delete/{{ $user->id }}">Valoraciones</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</section>

@include('partials.footer')
