<h2>Product List</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Add Product</a>

<form method="GET" action="{{ route('products.index') }}" class="mb-4 row g-2">
    <div class="col-md-4">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search name, description or category"
        >
    </div>

    <div class="col-md-2">
        <input
            type="number"
            name="price_min"
            value="{{ request('price_min') }}"
            class="form-control"
            placeholder="Min Price"
            min="0"
            step="0.01"
        >
    </div>

    <div class="col-md-2">
        <input
            type="number"
            name="price_max"
            value="{{ request('price_max') }}"
            class="form-control"
            placeholder="Max Price"
            min="0"
            step="0.01"
        >
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Category</th><th>Price</th><th>Quantity</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach(\App\Models\Product::with('category')->get() as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


