@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tabla Usuarios BatoiPOP</h1>
    </div>
</div>
<section class="py-5">
    <div class="container">
            <table class="table"  >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Actions</th>
                </tr>
                </thead>
                @if(\PHPUnit\Framework\isEmpty($users))
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="crud" href="/delete/{{ $user->id }}"><i class="bi bi-trash"></i></a>
                                <a class="crud" href="{{route('product.show', $user->id)}}"><i class="bi bi-bag"></i></a>
                                <a class="crud" href="{{route('mensaje.show', $user->id)}}"><i class="bi bi-chat-left"></i></a>
                                <a class="crud" href="{{route('valoracion.show', $user->id)}}"><i class="bi bi-star"></i></a>
                                <a class="crud" href="{{route('user.show', $user->id)}}"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</section>

@include('partials.footer')
