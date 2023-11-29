<form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        Delate
    </button>
</form>
