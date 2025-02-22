@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="display-3 fw-bold text-primary animate-fadein">Welcome to <span class="text-success">Store Hanan</span></h1>
        <p class="fs-5 text-muted">Find the best products with quality and elegance</p>
        
        <a href="{{ route('products.index') }}" class="btn btn-lg btn-success px-5 py-2 fw-bold shadow-sm mt-3">
            <i class="fa-solid fa-store"></i> Shop Now
        </a>
    </div>
</div>

<style>
    .animate-fadein {
        animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
