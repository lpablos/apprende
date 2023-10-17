@extends('application.layout.default')

@section('content')
<!-- @include('application.pages.menus.menu_account_base') -->

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
                    <div class="dashboard">
                        <div class="dashboard__profile card profile-card">
                            <div class="card-body profile-card__body">
                                <div class="profile-card__avatar">
                                    <img src="{{ asset('images/avatars/avatar-3.jpg')}}" alt="">
                                </div>
                                <div class="profile-card__name">{{ $user['name'].' '.$user['ap_paterno'].' '.$user['ap_materno'] }}</div>
                                <div class="profile-card__email">{{ $user['email']}}</div>
                                <div class="profile-card__edit">
                                    <a href="{{ route('dashboard.usuario') }}" class="btn btn-secondary btn-sm">Editar Perfil</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="dashboard__address card address-card address-card--featured">
                            <div class="address-card__badge">Default Address</div>
                            <div class="address-card__body">
                                <div class="address-card__name">Helena Garcia</div>
                                <div class="address-card__row">
                                    Random Federation<br>
                                    115302, Moscow<br>
                                    ul. Varshavskaya, 15-2-178
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Phone Number</div>
                                    <div class="address-card__row-content">38 972 588-42-36</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Email Address</div>
                                    <div class="address-card__row-content">stroyka@example.com</div>
                                </div>
                                <div class="address-card__footer">
                                    <a href="account-edit-address.html">Edit Address</a>
                                </div>
                            </div>
                        </div> -->
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop