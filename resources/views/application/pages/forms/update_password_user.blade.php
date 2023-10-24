<form action="{{ route('password.update') }}" method="post">
    @csrf
    @method('put')    
    <div class="form-group">
        <label for="current_password">Contraseña actual</label>
        <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Contraseña actual">
    </div>
    <div class="form-group">
        <label for="password">Nueva Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Nueva Contraseña">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar Contraseña">
    </div>  
    <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
</form>

<script>
    setTimeout(() => {
        
        // alert()->success('Title','Lorem Lorem Lorem');
    }, 1000);

</script>