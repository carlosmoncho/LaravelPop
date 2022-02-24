@include('partials.header')
<div class="d-flex d-flex justify-content-center vh-100">
    <form action="{{route('categoria.store')}}" method='POST' enctype="multipart/form-data">
        <h1>Create Categoría</h1>
        <br>
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre Categoría:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre aquí" value="{{old('nombre')}}">
            @if ($errors->has('nombre'))
                <div class="text-danger">
                    {{ $errors->first('nombre') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Escribe la descripcion aquí" rows="4" cols="50">{{old('descripcion')}}</textarea>
            @if ($errors->has('descripcion'))
                <div class="text-danger">
                    {{ $errors->first('descripcion') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="file">Imagen</label>
            <input type="file" name="img" value="{{old('img')}}">
            @if ($errors->has('img'))
                <div class="text-danger">
                    {{ $errors->first('img') }}
                </div>
            @endif
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Crear Categoría</button>
        </div>
    </form>
</div>
@include('partials.footer')
