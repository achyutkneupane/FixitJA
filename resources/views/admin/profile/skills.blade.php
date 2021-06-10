{{-- Author: Achyut Neupane --}}

@extends('layouts.app')
@section('content')
    @php
    $page_title = 'Skills';
    $profileSkillIsActive = 'true';
    @endphp
    <div class="row">
        @include('admin.profile.userSideBar', $user)
        <div class="col-lg-8">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            User Skills
                        </h3>
                    </div>
                </div>
                {{-- Show Skills --}}

                <div class="card-body row">
                @if($subCats->count() > 0)
                    @foreach ($subCats as $subCat)
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="gutter-b border border-4 rounded-lg px-5 py-4">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h3 class="text-uppercase">
                                            {{ ucwords($subCat['category']['category_name']) }}
                                        </h3>
                                        @if(isset($subCat['document']->experience))
                                        <div class="d-flex justify-content-end">
                                            Experience: <div class="text-muted ml-3">{{ $subCat['document']->experience }} years</div>
                                        </div>
                                        @endif
                                    </div>
                                    <ul>
                                        @foreach ($subCat['subcategory'] as $subs)
                                            <li>{{ ucwords($subs->name) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">
                                {{ $user == auth()->user() ? 'You' : $user->name }} have no skills registered.
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
