@include('partials.header')
<div class="d-flex d-flex justify-content-center vh-100">
    <form action="{{route('empleat.store')}}" method='POST' enctype="multipart/form-data">
        <h1>Create Empleados</h1>
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Escribe el nombre aquí" value="{{old('name')}}">
            @if ($errors->has('name'))
                <div class="text-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Escribe el email aquí" value="{{old('email')}}">
            @if ($errors->has('email'))
                <div class="text-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Escribe el password aquí" value="{{old('password') }}">
            @if ($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Create</button>
        </div>
    </form>
</div>
@include('partials.footer')
