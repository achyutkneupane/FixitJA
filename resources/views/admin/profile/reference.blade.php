{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'References';
    $profileReferenceIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                        References
                        </h3>
                    </div>
                </div>
                {{-- Show Skills --}}

                <div class="card-body">
                    @if ($user->references->count() != 0)
                    <div class="accordion accordion-toggle-arrow" id="referenceAccordian">
                        @foreach ($user->references as $reference)
                            <div class="card my-4">
                                <div class="card-header">
                                    <div class="card-title" data-toggle="collapse" data-target="#reference{{ $loop->index }}">
                                        {{ ucwords($reference->refname) }}
                                    </div>
                                </div>
                                <div id="reference{{ $loop->index }}" class="collapse {{ $loop->first ? 'show' : '' }}" data-parent="#referenceAccordian">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="form-control form-control-lg form-control-solid">
                                                    <a href="mailto:{{ $reference->refemail }}">{{ $reference->refemail }}</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Contact Number:</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="form-control form-control-lg form-control-solid">
                                                    <a href="tel:{{ $reference->refphone }}">{{ $reference->refphone }}</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="text-center">
                                        Reference record not found
                                    </h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/profile/profile.js') }}" type="text/javascript"></script>
@endsection
