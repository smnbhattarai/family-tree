@extends('layouts.app', [
    'pageTitle' => __('Update Family')
])

@section('main_content')

    <div class="row">
        <div class="col-lg-2 col-xl-3"></div>

        <div class="col-lg-8 col-xl-6">
            <div class="ft-page-header">
                <span class="ft-eyebrow">{{ __('Family Record') }}</span>
                <h2>{{ __('Edit Family') }}</h2>
                <p>{{ __('Update this member's details and relationships.') }}</p>
            </div>

            <form action="{{ route('admin.family.update', $family->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="ft-fieldset">
                    <legend class="float-none w-auto px-3"><i class="bi bi-person-vcard"></i> {{ __('Personal Detail') }}</legend>
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
                            <img class="ft-avatar-preview" src="{{ asset($family->thumbnailPath()) }}" alt="Avatar" width="70" height="70">
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

                <fieldset class="ft-fieldset">
                    <legend class="float-none w-auto px-3"><i class="bi bi-telephone"></i> {{ __('Contact Detail') }}</legend>
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

                <fieldset class="ft-fieldset">
                    <legend class="float-none w-auto px-3"><i class="bi bi-people"></i> {{ __('Family Detail') }}</legend>
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
                                'selected' => $family->spouse ? ($family->spouse) : [],
                            ])
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </fieldset>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="bi bi-check2-circle me-1"></i> {{ __('Update Family') }}</button>
                </div>

            </form>
        </div>

        <div class="col-lg-2 col-xl-3"></div>

    </div>

@endsection
