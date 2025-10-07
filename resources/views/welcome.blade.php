@extends('layouts.app', [
    'pageTitle' => config('app.name')
])

@section('main_content')
    <div class="">
        <img src="{{ config('app.url') . '/assets/images/tree.svg' }}" alt="{{ config('app.name') }}" class="img-fluid rounded mx-auto d-block">
    </div>

@endsection
