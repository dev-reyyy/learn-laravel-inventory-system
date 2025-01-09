<div class="modal-header">
    <h1 class="modal-title fs-5">View Warehouse</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <div class="row mb-2">
        <div class="col-auto">
            <h4 class="fw-semibold">{{ $warehouse->name }} </h4>
        </div>
        <div class="col">
            <p class="mb-0"> [{{ $warehouse->reference_code }}]</p>
        </div>
    </div>
    <p class="mb-0">{{ $warehouse->address }}</p>
</div>