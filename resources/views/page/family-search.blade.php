@extends('layouts.app', [
    'pageTitle' => __('Family Tree')
])

@section('main_content')

    <div class="ft-page-header">
        <span class="ft-eyebrow">{{ __('Search') }}</span>
        <h2>{{ __('Find a family member') }}</h2>
        <p>{{ __('Search by name, address or phone number.') }}</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8 col-lg-6">
            <div class="ft-search">
                <i class="bi bi-search"></i>
                <input type="search" class="form-control" id="search" placeholder="{{ __('Search family members...') }}" aria-label="{{ __('Search family members...') }}">
                <div id="spinner" class="spinner-border" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div id="searchResultCount" class="form-text text-center mt-3"></div>
        </div>
    </div>


    <div class="row g-4" id="personCard">

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
                    spinner.style.display = 'inline-block';
                    searchFamily(query);
                }
            });

            // Populate search with user's name initially
            setTimeout(function() {
                let searchInput = document.querySelector('#search');
                searchInput.value = "{{ auth()->user()->firstName() }}";
                searchInput.dispatchEvent(new Event('keyup', { bubbles: true }));
            }, 500);

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

                    const res = await response.json();
                    displayFamilyDetail(res);
                    performMark("#personCard", "#search");
                } catch (error) {
                    console.error('Error fetching data:', error.message);
                }
                spinner.style.display = 'none';
            }


            function displayFamilyDetail(res) {
                let html = '';
                res.data.forEach(function (d) {
                    html += `
                    <div class="col-md-6 col-xl-4">
                      <div class="card ft-person-card">
                        <div class="card-body d-flex gap-3 align-items-start position-relative">
                          <img src="${d.thumbnail}" class="ft-person-photo" alt="${d.name}">
                          <div class="flex-grow-1">
                            <h5 class="card-title mb-2"><a href="family/${d.id}" target="_blank">${d.name}</a></h5>
                            <ul class="ft-person-meta">
                              <li><i class="bi bi-geo-alt"></i><span>{{ __('Address') }}: ${d.address}</span></li>
                              <li><i class="bi bi-telephone"></i><span>{{ __('Phone') }}: ${d.phone}</span></li>
                              <li><i class="bi bi-person"></i><span>{{ __('Gender') }}: ${d.gender}</span></li>
                            </ul>
                            <p class="card-text mt-2 mb-0"><small class="text-body-secondary">Last updated ${d.updated_at}</small></p>
                          </div>
                        </div>
                      </div>
                    </div>
                `;
                });

                if (!res.data.length) {
                    html = `<div class="col-12 ft-empty"><i class="bi bi-tree"></i><p class="mt-2">{{ __('No family members found. Try a different name.') }}</p></div>`;
                }

                card.innerHTML = html;
                if (res.data.length <= 1) {
                    searchResultCount.innerText = `Showing ` + res.data.length + ` result out of ` + res.total + ' total';
                } else {
                    searchResultCount.innerText = `Showing ` + res.data.length + ` results out of ` + res.total + ' total';
                }
            }

        });

    </script>
@endsection
