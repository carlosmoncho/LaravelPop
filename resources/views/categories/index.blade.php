@include('partials.header')
<div class="container">
    <div class="row justify-content-center">
        <h1>Categorias BatoiPOP</h1>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <table class="table"  >
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th><th scope="col">Imagen</th><th scope="col">Categoria</th><th scope="col">Total Productos</th><th scope="col">Descripcion</th><th scope="col">Actions <a href="{{route('categoria.create')}}" class="btn btn-sm btn-dark">New</a></th>
            </tr>
            </thead>
            @if(\PHPUnit\Framework\isEmpty($categorias))
                <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td> <img src="{{$categoria->img}}" style="height:90px"></td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{count($categoria->producto)}}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>
                            <a class="crud" href="/deleteCategoria/{{ $categoria->id }}"><i class="bi bi-trash"></i></a>
                            <a class="crud" href="{{route('categoria.edit', $categoria->id)}}"><i class="bi bi-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $categorias->links() }}
        </div>
    </div>
</section>

@include('partials.footer')
