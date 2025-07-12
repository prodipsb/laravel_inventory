@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Product</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label>Category:</label>
                <select name="category_id" class="form-control">
                    <option value="">Select</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Price:</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label>Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection