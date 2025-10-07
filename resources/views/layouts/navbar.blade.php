<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ config('app.url') }}">
            <img src="{{ config('app.url') . '/assets/images/logo.svg' }}" alt="{{ config('app.name') }}" width="30"
                 height="24" class="d-inline-block align-text-top">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleButton"
                aria-controls="navbarToggleButton" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggleButton">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ config('app.url') }}">{{ __('Home') }}</a>
                </li>
            </ul>

            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#">{{ __('Login') }}</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
