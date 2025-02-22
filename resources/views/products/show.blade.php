@extends('products.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">Product Details</h2>
        </div>
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-end mb-3">
                <a class="btn btn-outline-primary" href="{{ route('products.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="row">
                <!-- Card untuk Detail Produk -->
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm p-4 bg-light">
                        <div class="mb-3">
                            <h5 class="fw-bold text-primary"><i class="fa fa-box"></i> Product Name</h5>
                            <p class="fs-4 fw-semibold text-dark">{{ $product->name }}</p>
                        </div>

                        <div class="mb-3">
                            <h5 class="fw-bold text-primary"><i class="fa fa-info-circle"></i> Product Details</h5>
                            <p class="fs-5 text-muted">{{ $product->detail }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card untuk Gambar Produk -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-3 text-center">
                        <h5 class="fw-bold text-primary"><i class="fa fa-image"></i> Product Image</h5>
                        <img src="/images/{{ $product->image }}" 
                            class="img-fluid rounded shadow-sm d-block mx-auto border border-3 border-secondary p-1" 
                            style="max-width: 250px; height: auto;">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
