@extends('layouts.app')

@section('content')
    @if ($page === 'categories')
        @include('categories.category-list')
    @else
        @include('products.product-list')
    @endif
@endsection
