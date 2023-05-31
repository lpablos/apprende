<div style="display:block; width: 25px;">
    {{-- @can('projects.edit') --}}
        <a href="{{route('projects.edit', $id )}}" class="btn btn-outline-warning" ><i class="bx bx-edit me-0"></i></a>
    {{-- 
    @endcan
    @can('projects.destroy')
    --}}
        <form action="{{route('projects.destroy', $id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-outline-danger" id="trash"><i class="bx bx-trash me-0"></i></button>
        </form>
    {{-- @endcan --}}
</div>