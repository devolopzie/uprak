@extends('products.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0"><i class="fa-solid fa-plus"></i> Add New Product</h2>
        </div>
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-outline-primary btn-sm shadow-sm" href="{{ route('products.index') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="inputName" class="form-label fw-bold text-primary">
                        <i class="fa-solid fa-box"></i> Product Name:
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control border-primary shadow-sm @error('name') is-invalid @enderror" 
                        id="inputName" 
                        placeholder="Enter product name">
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="inputDetail" class="form-label fw-bold text-primary">
                        <i class="fa-solid fa-info-circle"></i> Product Details:
                    </label>
                    <textarea 
                        class="form-control border-primary shadow-sm @error('detail') is-invalid @enderror" 
                        style="height: 150px" 
                        name="detail" 
                        id="inputDetail" 
                        placeholder="Enter product details"></textarea>
                    @error('detail')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="inputImage" class="form-label fw-bold text-primary">
                        <i class="fa-solid fa-image"></i> Product Image:
                    </label>
                    <input 
                        type="file" 
                        name="image" 
                        class="form-control border-primary shadow-sm @error('image') is-invalid @enderror" 
                        id="inputImage" onchange="previewImage(event)">
                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Card untuk Preview Gambar -->
                <div id="imagePreviewContainer" class="d-none">
                    <div class="card p-3 shadow-sm border-0 text-center">
                        <h6 class="fw-bold text-secondary">Image Preview:</h6>
                        <img id="imagePreview" class="img-fluid rounded shadow-sm border border-3 border-secondary p-1" 
                             style="max-width: 250px; height: auto;">
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-success btn-lg fw-bold shadow-sm">
                        <i class="fa-solid fa-floppy-disk"></i> Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        let imagePreviewContainer = document.getElementById('imagePreviewContainer');
        let imagePreview = document.getElementById('imagePreview');
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
