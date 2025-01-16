<div class="modal-header">
    <h1 class="modal-title fs-5">Product Information</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <div class="row">
        <div class="col">
            <div class="row text-group">
                <small>Name</small>
                <strong><p>{{ $product->name }}</p></strong>
            </div>
            <div class="row">
                <div class="col text-group">
                    <small>SKU</small>
                    <p>{{ $product->sku }}</p>
                </div>
                <div class="col text-group">
                    <small>Category</small>
                    <p>{{ $product->category->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-group">
                    <small>Cost Price</small>
                    <p>{{ $product->cost_price }}</p>
                </div>
                <div class="col text-group">
                    <small>Unit Price</small>
                    <p>{{ $product->unit_price }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-group">
                    <small>Quantity</small>
                    <p>{{ $product->quantity }}</p>
                </div>
                <div class="col text-group">
                    <small>Unit</small>
                    <p>{{ $product->unit }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-group">
                    <small>Reorder Level</small>
                    <p>{{ $product->reorder_level }}</p>
                </div>
                <div class="col text-group">
                    <small>Status</small>
                    <div>
                        <p class="badge text-bg-{{ $product->status == 'active' ? 'success' : 'light'}} d-inline-block">
                            {{ ucwords($product->status) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <small>Description</small>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-center border rounded product-img-container">
                <img class="product-img square-img" src="{{ asset($product->featured_image ? $product->featured_image : 'assets/images/placeholder-600X400.jpg') }}" alt="{{ $product->name }} Featured Image">
            </div>
            <div class="d-flex img-gallery">

            </div>
        </div>
    </div>
</div>