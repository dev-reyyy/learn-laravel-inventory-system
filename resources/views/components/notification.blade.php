<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    @if (session('success'))
        <div class="toast show align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div>
                        <i class="bi bi-check-circle-fill"></i>
                        <strong class="fs-6">Success</strong>
                    </div>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('warning'))
        <div class="toast show align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div>
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <strong class="fs-6">Warning</strong>
                    </div>
                    <p class="mb-0">{{ session('warning') }}</p>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('error'))        
        <div class="toast show align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div>
                        <i class="bi bi-x-octagon-fill text-white"></i>
                        <strong class="fs-6">Error</strong>
                    </div>
                    <p class="mb-0">{{ session('error') }}</p>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- Validation Error --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="toast show align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <div>
                            <i class="bi bi-x-octagon-fill text-white"></i>
                            <strong class="fs-6">Error</strong>
                        </div>
                        <p class="mb-0">{{ $error }}</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endforeach
    @endif
</div>
