@include('partials.header')
<div class="d-flex d-flex justify-content-center vh-100">
    <form action="{{route('categoria.update', $categoria->id)}}" method='POST' enctype="multipart/form-data">
        <h1>Edit Categoría</h1>
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre Categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre aquí" value="{{$errors->any() ?  old('nombre') : $categoria->nombre}}">
            @if ($errors->has('nombre'))
                <div class="text-danger">
                    {{ $errors->first('nombre') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="descripcion">descripción:</label>
            <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Escribe la descripcion aquí" rows="4" cols="50">{{$errors->any() ?  old('descripcion') : $categoria->descripcion}}</textarea>
            @if ($errors->has('descripcion'))
                <div class="text-danger">
                    {{ $errors->first('descripcion') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="file">Imagen</label>
            <img style="height:90px" src="{{$errors->any() ?  old('img') : $categoria->img }}">
            <input type="file" name="img">
            @if ($errors->has('img'))
                <div class="text-danger">
                    {{ $errors->first('img') }}
                </div>
            @endif
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Edit Categoría</button>
        </div>
    </form>
</div>
@include('partials.footer')
