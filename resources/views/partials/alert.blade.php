@if (session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <img src="{{ asset('img/check.svg') }}" class="rounded me-2" alt="" width="20">
                <strong class="me-auto">Success</strong>
                <small>{{ now()->diffForHumans() }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <img src="{{ asset('img/error.svg') }}" class="rounded me-2" alt="" width="20">
                <strong class="me-auto">Error</strong>
                <small>{{ now()->diffForHumans() }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast bg-info text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img src="{{ asset('img/info.svg') }}" class="rounded me-2" alt="" width="20">
                <strong class="me-auto">Information</strong>
                <small>{{ now()->diffForHumans() }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('info') }}
            </div>
        </div>
    </div>
@endif
