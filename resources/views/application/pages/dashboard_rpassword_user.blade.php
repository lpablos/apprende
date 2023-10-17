@extends('application.layout.default')

@section('content')

<div class="page-header">
    <div class="page-header__container container mt-4">       
        <div class="page-header__title">
            <h1>Mi Cuenta</h1>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="row">
                @include('application.pages.menus.menu_account_base')
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h5>Actualizar Contraseña</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-7 col-xl-6">
                                    @include('application.pages.forms.update_password_user')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop