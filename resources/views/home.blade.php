@extends('layouts.app', [
    'pageTitle' => config('app.name')
])

@section('main_content')

    <div class="row">

        @auth
        <div class="col">
            <h3 class="text-center">{{ __('Welcome') }}</h3>
            <h4 class="text-center">{{ auth()->user()->name }}</h4>
            <p class="text-center">{{ __('Feel free to reach out if you want to add new information or want to update existing record.') }}</p>
        </div>
        @endauth

        <div class="col">
            <div>
                <img id="familyTreeFig" src="{{ config('app.url') . '/assets/images/tree.svg' }}" alt="{{ config('app.name') }}"
                     class="img-fluid rounded mx-auto d-block">
            </div>
        </div>

    </div>


@endsection

@section('footerScript')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector("#familyTreeFig").style.height = Math.floor(window.innerHeight * 0.80) + 'px';
        });
    </script>
@endsection
