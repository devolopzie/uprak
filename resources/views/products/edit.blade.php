@extends('products.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Edit Product</h2>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-between mb-4">
                <h4 class="text-secondary"><i class="fa-solid fa-edit"></i> Update Product Details</h4>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('products.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="inputName" class="form-label fw-bold text-primary"><i class="fa-solid fa-box"></i> Product Name:</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ $product->name }}"
                        class="form-control border-primary shadow-sm @error('name') is-invalid @enderror" 
                        id="inputName" 
                        placeholder="Enter product name">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="inputDetail" class="form-label fw-bold text-primary"><i class="fa-solid fa-info-circle"></i> Product Detail:</label>
                    <textarea 
                        class="form-control border-primary shadow-sm @error('detail') is-invalid @enderror" 
                        style="height:150px" 
                        name="detail" 
                        id="inputDetail" 
                        placeholder="Enter product details">{{ $product->detail }}</textarea>
                    @error('detail')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="inputImage" class="form-label fw-bold text-primary"><i class="fa-solid fa-image"></i> Product Image:</label>
                    <input 
                        type="file" 
                        name="image" 
                        class="form-control border-primary shadow-sm @error('image') is-invalid @enderror" 
                        id="inputImage">
                    @if($product->image)
                        <div class="mt-3 text-center">
                            <div class="card p-3 shadow-sm border-0">
                                <img src="/images/{{ $product->image }}" 
                                    class="img-fluid rounded shadow-sm border border-3 border-secondary p-1" 
                                    style="max-width: 250px; height: auto;">
                            </div>
                        </div>
                    @endif
                    @error('image')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success fw-bold shadow-sm">
                        <i class="fa-solid fa-save"></i> Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
