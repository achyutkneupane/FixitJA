{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
    @php
    $page_title = 'Proposed Categories';
    @endphp
    @if ($cats->count() == 0)
        @php
            $page_description = 'No categories';
        @endphp
    @elseif ($cats->count() == 1)
        @php
            $page_description = '1 category';
        @endphp
    @else
        @php
            $page_description = $cats->count() . ' categories';
        @endphp
    @endif
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID">ID</th>
                        <th title="Name">Name</th>
                        <th title="Description">Description</th>
                        <th title="Category">Category</th>
                        <th title="Date">Date</th>
                        <th title="Role">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>
                                {{ $cat->id }}
                            </td>
                            <td>
                                {{ $cat->name }}
                            </td>
                            <td>
                                {{ $cat->description }}
                            </td>
                            <td>{{ $cat->category->name }}</td>
                            <td>{{ $cat->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Approve</a>
                                <a href="#" class="btn btn-danger">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
