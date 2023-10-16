<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-group">
        <label>Correos Electrónico</label>
        <input name="email" type="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="form-group">
        <label>Contraseña</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <small class="form-text text-muted">
            <a href="">Forgotten Password</a>
        </small>
    </div>
    <div class="form-group">
        <div class="form-check">
            <span class="form-check-input input-check">
                <span class="input-check__body">
                    <input class="input-check__input" type="checkbox" id="login-remember">
                    <span class="input-check__box"></span>
                    <svg class="input-check__icon" width="9px" height="7px">
                        <use xlink:href="{{ asset('images/sprite.svg#check-9x7') }}"></use>
                    </svg>
                </span>
            </span>
            <label class="form-check-label" for="login-remember">Recordarme</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Iniciar</button>
    <p class="text-center">Ó</p>
    <div class="row mt-5">
        <button class="btn btn-primary btn-lg col-12 mlrt-3 mt-3">
            <i class="fab fa-facebook-f"></i> 
            Continuar con Face Book
        </button>
        <button class="btn btn-primary btn-lg col-12 mlr-3 mt-3" >
            <i class="fab fa-google "></i> 
            Continuar con Google
        </button>
    </div>
    <i class="fa-brands fa-google"></i>
</form>