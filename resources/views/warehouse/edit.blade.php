<div class="modal-header">
    <h1 class="modal-title fs-5">Edit Warehouse</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter warehouse name" value="{{ $warehouse->name }}" required>
        </div>
        <div class="mb-3">
            <label for="reference_code" class="form-label">Code Ref.</label>
            <input type="text" class="form-control" id="reference_code" name="reference_code" placeholder="Enter warehouse code" value="{{ $warehouse->reference_code }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter warehouse address" value="{{ $warehouse->address }}" required>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>