{{-- Author: Achyut Neupane --}}

{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')
    @php
    $page_title = 'Error Log';
    @endphp
    @if ($errors->count() == 0)
        @php
            $page_description = 'No errors';
        @endphp
    @elseif ($errors->count() == 1)
        @php
            $page_description = '<span class="text-danger">1 error</span>';
        @endphp
    @else
        @php
            $page_description = '<span class="text-danger">' . $errors->count() . ' errors</span>';
        @endphp
    @endif
    <div class="card card-custom">
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom text-center" id="kt_datatable">
                <thead>
                    <tr>
                        <th title="ID">ID</th>
                        <th title="Name">Title</th>
                        <th title="Role">Found By</th>
                        <th title="Email">Module</th>
                        <th title="Address">Solved By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($errors as $error)
                        @php
                            if (isset($error->solved_by)):
                                $tableColor = 'table-success';
                            else:
                                $tableColor = 'table-danger';
                            endif;
                        @endphp
                        <tr class="{{ $tableColor }}" style="transform: rotate(0);">
                            <td>
                                <a href="{{ route('viewErrorDetail', $error->id) }}" class="stretched-link"
                                    style="color: #000;">
                                    {{ $error->id }}
                                </a>
                            </td>
                            <td>
                                {{ $error->title }}
                            </td>
                            <td>
                                {{ $error->foundBy->name }}
                            </td>
                            <td>
                                {{ $error->module }}
                            </td>
                            <td>
                                @if (isset($error->solvedBy))
                                    {{ $error->solvedBy->name }}
                                @else
                                    Not Solved
                                @endif
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
