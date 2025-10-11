@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="row">
        <div class="col-md-12"></div>

        <div class="col-md-12">
            <table class="table table-hover table-sm" id="familyTable">
                <thead>
                <tr>
                    <th scope="col">{{ __('S.No.') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Tel') }}</th>
                    <th scope="col">{{ __('Address') }}</th>
                    <th scope="col">{{ __('Father') }}</th>
                    <th scope="col">{{ __('Mother') }}</th>
                    <th scope="col">{{ __('Spouse') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($families as $family)
                    <tr>
                        <td>{{ $family->id }}</td>
                        <td>
                            @if($family->avatar)
                                <img src="{{ asset($family->thumbnailPath()) }}" alt="Avatar" width="30" height="30"> &nbsp;&nbsp;
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.family.show', $family->id) }}" role="button"><i class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.family.edit', $family->id) }}" role="button"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-danger btn-sm" href="#" role="button"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

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
            new DataTable('#familyTable');
        });
    </script>
@endsection
