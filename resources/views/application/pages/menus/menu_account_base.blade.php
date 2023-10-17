<div class="col-12 col-lg-3 d-flex">
    <div class="account-nav flex-grow-1">
        <h4 class="account-nav__title">Navegación</h4>
        <ul>
            <li class="account-nav__item {{Request::url() == route('dashboard.index')? 'account-nav__item--active': ''}}">
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="account-nav__item {{Request::url() == route('dashboard.usuario')? 'account-nav__item--active': ''}}">
                <a href="{{ route('dashboard.usuario') }}">Editar Perfil</a>
            </li>      
            <li class="account-nav__item {{Request::url() == route('dashboard.password')? 'account-nav__item--active': ''}}">
                <a href="{{ route('dashboard.password') }}">Contraseña</a>
            </li>
            <li class="account-nav__item {{Request::url() == route('dashboard.delete.account')? 'account-nav__item--active': ''}}">
                <a href="{{ route('dashboard.delete.account') }}">Eliminar Cuenta</a>
            </li>
            <li class="account-nav__item ">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf                    
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                
            </li>
        </ul>
    </div>
</div>