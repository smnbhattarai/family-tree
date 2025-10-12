@extends('layouts.app', [
    'pageTitle' => __('Update Family')
])

@section('main_content')

    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <h4 class="text-center mb-3">{{ __('Edit Family') }}</h4>

            <form action="{{ route('admin.family.update', $family->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="border rounded-3 p-3 mb-3">
                    <legend class="float-none w-auto px-3">{{ __('Personal Detail') }}</legend>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                            'name' => 'first_name',
                            'label' => __('First Name'),
                            'value' => $family->first_name,
                        ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                        'name' => 'middle_name',
                        'label' => __('Middle Name'),
                        'value' => $family->middle_name,
                    ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                                                'name' => 'last_name',
                                                'label' => __('Last Name'),
                                                'value' => $family->last_name,
                                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'dob',
                                'label' => __('Date of Birth'),
                                'type' => 'date',
                                'max_date' => now()->format('Y-m-d'),
                                'min_date' => now()->subYears(100)->format('Y-m-d'),
                                'value' => $family->dob,
                            ])

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.radio_input', [
                                'name' => 'gender',
                                'label' => __('Gender'),
                                'options' => [
                                    'M' => __('Male'),
                                    'F' => __('Female'),
                                ],
                                'checked' => $family->gender,
                            ])
                        </div>
                        <div class="col text-center">
                            @if($family->avatar)
                            <img class="text-right" src="{{ asset($family->thumbnailPath()) }}" alt="Avatar" width="70" height="70">
                            @endif
                        </div>
                        <div class="col">
                            @include('partials.form.file_input', [
                                'name' => 'avatar',
                                'label' => __('Avatar'),
                                'accept' => 'image/*',
                            ])
                        </div>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 mb-3">
                    <legend class="float-none w-auto px-3">{{ __('Contact Detail') }}</legend>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'email',
                                'label' => __('Email'),
                                'type' => 'email',
                                'value' => $family->email,
                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'phone',
                                'label' => __('Phone'),
                                'value' => $family->phone,
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'address',
                                'label' => __('Address'),
                                'value' => $family->address,
                            ])
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </fieldset>

                <fieldset class="border rounded-3 p-3 mb-3">
                    <legend class="float-none w-auto px-3">{{ __('Family Detail') }}</legend>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Father'),
                                'name' => 'father_id',
                                'options' => $fathers,
                                'selected' => $family->father_id,
                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Mother'),
                                'name' => 'mother_id',
                                'options' => $mothers,
                                'selected' => $family->mother_id,
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Spouse'),
                                'name' => 'spouse',
                                'options' => $spouse,
                                'multiple' => true,
                                'selected' => $family->spouse ? json_decode($family->spouse) : [],
                            ])
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </fieldset>

                <button class="btn btn-primary mt-4" type="submit">{{ __('Update Family') }}</button>

            </form>
        </div>

        <div class="col-md-3"></div>

    </div>

@endsection
