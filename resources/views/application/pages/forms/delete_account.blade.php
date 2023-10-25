<form action="{{ route('dashboard.baja.cuenta' )}}" method="post">
    @method('DELETE')
    @csrf
    <div class="form-group">
        <label for="profile-first-name">
            Una vez que se elimine su cuenta, 
            todos sus recursos y datos se eliminarán permanentemente. 
            Antes de eliminar su cuenta, descargue cualquier dato o 
            información que desee conservar.</label>
       
    </div>    
    <button type="submit" class="btn btn-primary mt-4">Eliminar</button>
</form>

<script>
    setTimeout(() => {
        
        // alert()->success('Title','Lorem Lorem Lorem');
    }, 1000);

</script>