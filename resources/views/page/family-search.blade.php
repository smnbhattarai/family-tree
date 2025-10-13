@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mb-5">
            <div class="form-floating mb-3">
                <input type="search" class="form-control" id="search" placeholder="Search family members ...">
                <label for="search">{{ __('Search family members...') }}</label>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>


    <div class="row" id="personCard">

    </div>

@endsection

@section('footerScript')
    <script>
        const card = document.querySelector('#personCard');
        document.querySelector('#search').addEventListener('keyup', function (e) {
            let query = this.value;
            card.innerHTML = '';
            if (query.length > 1) {
                searchFamily(query);
            }
        });

        async function searchFamily(q) {
            const url = '{{ route("page.search.familyData") }}';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({q}),
                });

                if (!response.ok) {
                    throw new Error(`Server error: ${response.status} ${response.statusText}`);
                }

                const data = await response.json();
                displayFamilyDetail(data);
            } catch (error) {
                console.error('Error fetching data:', error.message);
            }
        }

        function displayFamilyDetail(data){
            let html = '';
            data.forEach(function(d) {
                html += `
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="${d.thumbnail}" class="img-fluid rounded-start" alt="${d.first_name}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${d.name}</h5>
                                    <table class="table table-borderless table-responsive">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{ __('Date of Birth') }}</th>
                                            <td>${d.dob}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Gender') }}</th>
                                            <td>${d.gender}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Email') }}</th>
                                            <td>${d.email}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Phone') }}</th>
                                            <td>${d.phone}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Address') }}</th>
                                            <td>${d.address}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Father') }}</th>
                                            <td>${d.father}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Mother') }}</th>
                                            <td>${d.mother}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">{{ __('Spouse') }}</th>
                                            <td>${d.spouse.join(', ')}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p class="card-text"><small class="text-body-secondary">Last updated ${d.updated_at}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });

            card.innerHTML = html;
        }
    </script>
@endsection
