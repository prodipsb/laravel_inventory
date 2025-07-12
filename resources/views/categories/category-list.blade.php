<h2>Category List</h2>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Add Category</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Parent</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Models\Category::with('parent')->get() as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent->name ?? '—' }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
