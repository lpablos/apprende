<form action="{{ route('dashboard.usuario.update') }}" method="POST">
        @csrf
    <div class="form-group">
        <label>Nombre</label>
        <input name="name" type="text" class="form-control" placeholder="Nombre" value="{{ $user['name']}}" required>
    </div>
    <div class="form-group">
        <label>Ap. Paterno</label>
        <input name="apPaterno" type="text" class="form-control" placeholder="Ap. Paterno" value="{{ $user['ap_paterno']}}" required>
    </div>
    <div class="form-group">
        <label>Ap. Materno</label>
        <input name="apMaterno" type="text" class="form-control" placeholder="Ap. Materno" value="{{ $user['ap_materno']}}" required>
    </div>
    <div class="form-group">
        <label>Correo Electrónico</label>
        <input name="email" type="email" class="form-control" placeholder="Correo Electrónico" value="{{ $user['email']}}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
</form>

<script>
    setTimeout(() => {
        
        // alert()->success('Title','Lorem Lorem Lorem');
    }, 1000);

</script>