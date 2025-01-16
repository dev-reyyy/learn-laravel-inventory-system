<div class="modal-header">
    <h1 class="modal-title fs-5">Edit Product</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required value="{{ $product->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU" required value="{{ $product->sku }}">
                    </div>
                    <div class="col">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id" required>
                            <option value="" disabled>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cost_price" class="form-label">Cost Price</label>
                        <input type="number" class="form-control" id="cost_price" name="cost_price" placeholder="Enter Cost Price" step="0.01" value="{{ $product->cost_price }}">
                    </div>
                    <div class="col">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Enter Unit Price" step="0.01" value="{{ $product->unit_price }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="quantity" class="form-label">Initial Stock</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" step="0.01" value="{{ $product->quantity }}" value="0" required>
                    </div>
                    <div class="col">
                        <label for="unit" class="form-label">Unit</label>
                        <select class="form-select" name="unit" id="unit" required>
                            <option value="" disabled selected>Select a Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit }}" {{ $product->unit == $unit ? 'selected' : '' }}>{{ ucfirst($unit) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="reorder_level" class="form-label">Reorder Level</label>
                        <input type="number" class="form-control" id="reorder_level" name="reorder_level" placeholder="Enter Reorder Level" step="0.01" value="{{ $product->reorder_level }}" required>
                    </div>
                    <div class="col">
                        <label for="status" class="form-label">Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="active" {{ $product->status == 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                  Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="inactive" {{ $product->status == 'inactive' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description">{{ $product->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <label for="featured_image" class="form-label">Product Image</label>
                <div class="d-flex justify-content-center border rounded mb-2 product-img-container">
                    <img class="product-img square-img" src="{{ asset($product->featured_image ? $product->featured_image : 'assets/images/placeholder-600X400.jpg') }}" alt="placeholder">
                </div>

                <div class="mb-3">
                    <input class="form-control" type="file" name="featured_image" id="featured_image">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>