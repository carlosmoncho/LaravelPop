@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Tabla Empleados BatoiPOP</h1>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <table class="table"  >
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Actions <a href="{{route('empleat.create')}}" class="btn btn-sm btn-dark">New</a></th>
            </tr>
            </thead>
            @if(!empty($empleats))
                <tbody>
                @foreach ($empleats as $empleat)
                    <tr>
                        <td>{{ $empleat->id }}</td>
                        <td>{{ $empleat->name }}</td>
                        <td>{{ $empleat->email }}</td>
                        <td>
                            <a class="crud" href="/deleteEmpleado/{{ $empleat->id }}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $empleats->links() }}
        </div>
    </div>
</section>

@include('partials.footer')
