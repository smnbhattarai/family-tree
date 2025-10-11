@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <h4 class="text-center mb-3">{{ __('Add Family') }}</h4>

            <form action="{{ route('admin.family.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <fieldset class="border rounded-3 p-3 mb-3">
                    <legend class="float-none w-auto px-3">{{ __('Personal Detail') }}</legend>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                        'name' => 'first_name',
                        'label' => __('First Name'),
                    ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                        'name' => 'middle_name',
                        'label' => __('Middle Name')
                    ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                                                'name' => 'last_name',
                                                'label' => __('Last Name'),
                                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'dob',
                                'label' => __('Date of Birth'),
                                'type' => 'date',
                                'max_date' => now()->format('Y-m-d'),
                                'min_date' => now()->subYears(100)->format('Y-m-d'),
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
                                ]
                            ])
                        </div>
                        <div class="col text-center">
                            <img class="text-right" src="" alt="Avatar" width="70" height="70">
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
                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'phone',
                                'label' => __('Phone'),
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.text_input', [
                                'name' => 'address',
                                'label' => __('Address'),
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
                                'options' => [
                                    '1' => 'A',
                                    '2' => 'B',
                                    '3' => 'C',
                                    '4' => 'D',
                                ]
                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Mother'),
                                'name' => 'mother_id',
                                'options' => [
                                    '9' => 'W',
                                    '8' => 'X',
                                    '7' => 'Y',
                                    '6' => 'Z',
                                ]
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Spouse'),
                                'name' => 'spouse',
                                'options' => [
                                    '11' => 'L',
                                    '12' => 'M',
                                    '13' => 'O',
                                    '14' => 'P',
                                ],
                                'multiple' => true,
                            ])
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </fieldset>

                <button class="btn btn-primary mt-4" type="submit">{{ __('Add Family') }}</button>

            </form>
        </div>

        <div class="col-md-3"></div>

    </div>

@endsection
