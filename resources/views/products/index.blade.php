@extends('products.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Store Hannan</h2>
        </div>
        <div class="card-body p-4">
            
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <h4 class="text-secondary">Manage your products</h4>
                <a class="btn btn-success" href="{{ route('products.create') }}">
                    <i class="fa fa-plus"></i> Create New Product
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="80px">No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="text-center">{{ ++$i }}</td>
                            <td class="text-center">
                                <img src="/images/{{ $product->image }}" class="rounded img-thumbnail" width="80px">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->detail, 50, '...') }}</td>
                            <td class="text-center">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                                        <i class="fa-solid fa-eye"></i> Show
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">There are no products available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>

        </div>
    </div>
</div>
@endsection
