@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <span class="ft-eyebrow">{{ __('Administration') }}</span>
            <h2 class="mb-0">{{ __('Family Members') }}</h2>
        </div>
        <a class="btn btn-accent" href="{{ route('admin.family.create') }}"><i class="bi bi-person-plus me-1"></i> {{ __('Add') }}</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="tblContainer" class="ft-surface" style="opacity: 0">
                <table class="table table-hover" id="familyTable">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('S.No.') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Tel') }}</th>
                        <th scope="col">{{ __('Address') }}</th>
                        <th scope="col">{{ __('Father') }}</th>
                        <th scope="col">{{ __('Mother') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($families as $family)
                        <tr>
                            <td>{{ $family->id }}</td>
                            <td>
                                @if($family->avatar)
                                    <img src="{{ asset($family->thumbnailPath()) }}" alt="Avatar" class="ft-thumb">
                                @endif
                                {{ $family->name() }}
                                @if($family->gender == 'M')
                                    <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                @else
                                    <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                @endif
                            </td>
                            <td>{{ $family->email }}</td>
                            <td>{{ $family->phone }}</td>
                            <td>{{ $family->address }}</td>
                            <td>{{ $family?->father?->name() }}</td>
                            <td>{{ $family?->mother?->name() }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-primary btn-sm btn-icon mx-1 mb-1" title="{{ __('View') }}" href="{{ route('admin.family.show', $family->id) }}" role="button"><i class="bi bi-eye-fill"></i></a>
                                <a class="btn btn-info btn-sm btn-icon mx-1 mb-1" title="{{ __('Edit') }}" href="{{ route('admin.family.edit', $family->id) }}" role="button"><i class="bi bi-pencil-fill"></i></a>
                                <form
                                    action="{{ route('admin.family.destroy', $family->id) }}"
                                    method="POST"
                                    style="display: inline-block;"
                                    onsubmit="confirm('Are you sure you want to delete this record?')"
                                >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-icon mx-1 mb-1" type="submit" title="{{ __('Delete') }}"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css">
@endsection

@section('footerScript')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new DataTable('#familyTable', {});

            setTimeout(function () {
                fadeIn('#tblContainer');
            }, 150);
        });
    </script>
@endsection
