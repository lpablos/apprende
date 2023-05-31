@extends("layouts.app")
@section("style") @endsection
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">

            <div>

                @if(session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        {{--
                        <ul class="nav nav-tabs card-header-tabs justify-content-end" >
                            <li class="nav-item">
                                @can('users.create')
                                <a class="nav-link active" href="{{route('users.create')}}">Alta de usuario</a>
                                @endcan
                            </li>
                        </ul>
                        --}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Edición de </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Usuario</h6>
                        
                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put' ]) !!}
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
                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                {!! Form::label('roles', 'Listado de roles') !!}
                                @foreach($roles_existentes as $rol_existente)
                                    <div>
                                        <label>
                                        {!! Form::checkbox('roles[]', $rol_existente->id, null, ['class' => 'mr-1']) !!}
                                        {{$rol_existente->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                {!! Form::label('permisos', 'Listado de permisos') !!}
                                @foreach($permisos_existentes as $permiso_existente)
                                    <div>
                                        <label>
                                        {!! Form::checkbox('permisos[]', $permiso_existente->id, null, ['class' => 'mr-1']) !!}
                                        {{$permiso_existente->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                                {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary mt-2']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section("script")

@endsection