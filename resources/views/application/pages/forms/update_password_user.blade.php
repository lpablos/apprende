<form action="{{ route('register' )}}" method="post">
    @csrf
    <div class="form-group">
        <label for="profile-first-name">Contraseña actual</label>
        <input type="text" class="form-control" id="profile-first-name" placeholder="Contraseña actual">
    </div>
    <div class="form-group">
        <label for="profile-last-name">Nueva Contraseña</label>
        <input type="text" class="form-control" id="profile-last-name" placeholder="Nueva Contraseña">
    </div>
    <div class="form-group">
        <label for="profile-email">Confirmar Contraseña</label>
        <input type="email" class="form-control" id="profile-email" placeholder="Confirmar Contraseña">
    </div>  
    <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
</form>

<script>
    setTimeout(() => {
        
        // alert()->success('Title','Lorem Lorem Lorem');
    }, 1000);

</script>