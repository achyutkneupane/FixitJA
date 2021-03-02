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
                    @foreach ($subCats as $subCat)
                        <div class="col-sm-6 card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{ ucwords($subCat['category']['category_name']) }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($subCat['subcategory'] as $subs)
                                        <li>{{ ucwords($subs->name) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
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
