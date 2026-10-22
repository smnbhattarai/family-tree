@extends('layouts.app', [
    'pageTitle' => __('Add Family')
])

@section('main_content')

    <div class="row">
        <div class="col-lg-4 col-xl-3 order-last order-lg-first">
            <div id="existingMemberDiv">
            </div>
        </div>

        <div class="col-lg-8 col-xl-6">
            <div class="ft-page-header">
                <span class="ft-eyebrow">{{ __('Family Record') }}</span>
                <h2>{{ __('Add Family') }}</h2>
                <p>{{ __('Add a new member and connect them to their relatives.') }}</p>
            </div>

            <form action="{{ route('admin.family.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <fieldset class="ft-fieldset">
                    <legend class="float-none w-auto px-3"><i class="bi bi-person-vcard"></i> {{ __('Personal Detail') }}</legend>
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
                            <img class="ft-avatar-preview" id="avatarPreview" src="{{ config('app.url') . '/assets/images/avatar.png' }}" alt="Avatar" width="70" height="70">
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

                <fieldset class="ft-fieldset">
                    <legend class="float-none w-auto px-3"><i class="bi bi-people"></i> {{ __('Family Detail') }}</legend>
                    <div class="row">
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Father'),
                                'name' => 'father_id',
                                'options' => $fathers
                            ])
                        </div>
                        <div class="col">
                            @include('partials.form.select_input', [
                                'label' => __('Mother'),
                                'name' => 'mother_id',
                                'options' => $mothers
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
                            ])
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </fieldset>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-lg" type="submit"><i class="bi bi-check2-circle me-1"></i> {{ __('Add Family') }}</button>
                </div>

            </form>
        </div>

        <div class="d-none d-xl-block col-xl-3"></div>

    </div>

@endsection

@section('footerScript')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const existingMemberDiv = document.querySelector('#existingMemberDiv');
            document.querySelector('#avatar').addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    document.querySelector('#avatarPreview').src = URL.createObjectURL(this.files[0]);
                }
            });
            document.querySelector('#first_name').addEventListener('blur', function (e) {
                existingMemberDiv.innerHTML = '';
                let query = this.value;
                if (query.length > 1) {
                    searchFamily(query);
                }
            });

            async function searchFamily(q) {
                try {
                    const url = '{{ route("page.search.familyData") }}';
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({q}),
                    });

                    const res = await response.json();
                    displayFamilyDetail(res);
                } catch (error) {
                    console.error('Error fetching data:', error.message);
                }
            }

            function displayFamilyDetail(res) {
                let output = '';

                if (res && res.data.length) {
                    output += `<div class="card mt-5 mt-lg-0">`;
                    output += `<div class="card-header bg-transparent fw-bold"><i class="bi bi-info-circle me-1"></i> {{ __('Existing members with this name') }}</div>`;
                    output += `<ul class="list-group list-group-flush">`;
                    res.data.forEach(function (d) {
                        output += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${d.name}
                            <img src="${d.thumbnail}" alt="" class="ft-thumb m-0">
                        </li>`;
                    });
                    output += `</ul>`;
                    output += `</div>`;
                }

                existingMemberDiv.innerHTML = output;
            }
        });
    </script>
@endsection
