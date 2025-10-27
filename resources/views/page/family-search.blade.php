@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mb-5">
            <div class="form-floating mb-3">
                <input type="search" class="form-control form-control-sm" id="search" placeholder="Search family members ...">
                <label for="search">{{ __('Search family members...') }}</label>
                <div id="searchResultCount" class="form-text"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="spinner" class="spinner-border text-primary" role="status" style="margin-top: 10px;display: none;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <div class="row" id="personCard">

    </div>

@endsection

@section('footerScript')
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const card = document.querySelector('#personCard');
            const searchResultCount = document.querySelector('#searchResultCount');
            const spinner = document.querySelector('#spinner');

            // Start searching ...
            document.querySelector('#search').addEventListener('keyup', function (e) {
                let query = this.value;
                card.innerHTML = '';
                searchResultCount.innerHTML = '';
                if (query.length > 1) {
                    searchFamily(query);
                }
            });

            // Populate search with user's name initially
            setTimeout(function() {
                let searchInput = document.querySelector('#search');
                searchInput.value = "{{ auth()->user()->firstName() }}";
                searchInput.dispatchEvent(new Event('keyup', { bubbles: true }));
            }, 1000);

            async function searchFamily(q) {
                spinner.style.display = 'block';
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
                    performMark("#personCard", "#search");
                } catch (error) {
                    console.error('Error fetching data:', error.message);
                }
                spinner.style.display = 'none';
            }


            function displayFamilyDetail(data) {
                let html = '';
                data.forEach(function (d) {
                    html += `
                    <div class="col-md-4">
                    <div class="card shadow-lg mb-3">
                      <div class="row g-0">
                        <div class="col-md-4 text-center">
                          <img src="${d.thumbnail}" class="img-fluid rounded-start" alt="${d.first_name}">
                          <p class="mt-4"><a href="family/${d.id}" target="_blank" class="btn btn-primary btn-sm">{{ __('Detail') }}</a></p>
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">${d.name}</h5>
                                <p class="card-text">{{ __('Address') }}: ${d.address}</p>
                                <p class="card-text">{{ __('Phone') }}: ${d.phone}</p>
                                <p class="card-text">{{ __('Gender') }}: ${d.gender}</p>
                                <p class="card-text mt-3"><small class="text-body-secondary">Last updated ${d.updated_at}</small></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                `;
                });

                card.innerHTML = html;
                if (data.length <= 1) {
                    searchResultCount.innerText = `Showing ` + data.length + ` result ...`;
                } else {
                    searchResultCount.innerText = `Showing ` + data.length + ` results ...`;
                }
            }

        });

    </script>
@endsection
