<form action="{{ route('register' )}}" method="post">
    @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input name="name" type="text" class="form-control" placeholder="Nombre" required>
    </div>
    <div class="form-group">
        <label>Ap. Paterno</label>
        <input name="apPaterno" type="text" class="form-control" placeholder="Ap. Paterno" required>
    </div>
    <div class="form-group">
        <label>Ap. Materno</label>
        <input name="apMaterno" type="text" class="form-control" placeholder="Ap. Materno" required>
    </div>
    <div class="form-group">
        <label>Correo Electrónico</label>
        <input name="email" type="email" class="form-control" placeholder="Correo Electrónico" required>
    </div>
    <div class="form-group">
        <label>Contraseña (8 caracteres)</label>
        <input name="password" type="password" class="form-control" placeholder="Contraseña" min="8" required>
    </div>
    <div class="form-group">
        <label>Repetir Contraseña (8 caracteres)</label>
        <input name="password_v" type="password" class="form-control" placeholder="Contraseña" min="8" required>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Registrarme</button>
</form>

<script>
    setTimeout(() => {
        
        // alert()->success('Title','Lorem Lorem Lorem');
    }, 1000);

</script>