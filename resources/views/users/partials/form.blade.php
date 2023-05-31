<div class="row">
    <div class="col-12 text-center h5 text-muted">
        <label>Datos generales</label>
        <hr>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 position-relative input-icon">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', isset($user->name) ? $user->name : null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
        @error('name')
            <small class="text-danger"> {{ $message }} </small>
        @enderror
    </div>
    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
        {!! Form::label('email', 'Correo') !!}
        {!! Form::text('email', isset($user->email) ? $user->email : null, ['class' => 'form-control', 'placeholder' => 'Correo']) !!}
        @error('email')
            <small class="text-danger"> {{ $message }} </small>
        @enderror
    </div>
    <div class="col-sm-5 col-md-3 col-lg-3 col-xl-3">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', isset($user->password) ? $user->password : null, ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
        @error('password')
            <small class="text-danger"> {{ $message }} </small>
        @enderror
    </div>
</div>
