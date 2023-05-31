<div style="display:block; width: 25px;">
    {{-- @can('admin.failures.edit') --}}
        <a href="{{route('roles.edit', $id )}}" class="btn btn-outline-warning" ><i class="bx bx-edit me-0"></i></a>
    {{-- 
    @endcan
    @can('admin.failures.destroy')
    --}}
        <form action="{{route('roles.destroy', $id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-outline-danger" id="trash"><i class="bx bx-trash me-0"></i></button>
        </form>
    {{-- @endcan --}}
</div>