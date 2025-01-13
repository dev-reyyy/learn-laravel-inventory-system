<div class="modal-header">
    <h1 class="modal-title fs-5">New Product</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU" required>
                    </div>
                    <div class="col">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category" id="category" required>
                            <option value="" disabled selected>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cost_price" class="form-label">Cost Price</label>
                        <input type="number" class="form-control" id="cost_price" name="cost_price" placeholder="Enter Cost Price" step="0.01">
                    </div>
                    <div class="col">
                        <label for="unit_price" class="form-label">Unit Price</label>
                        <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Enter Unit Price" step="0.01" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="quantity" class="form-label">Initial Stock</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" step="0.01">
                    </div>
                    <div class="col">
                        <label for="unit" class="form-label">Unit</label>
                        <select class="form-select" name="unit" id="unit" required>
                            <option value="" disabled selected>Select a Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit }}">{{ ucfirst($unit) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>