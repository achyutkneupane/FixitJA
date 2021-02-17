{{-- Subheader V1 --}}
<div class="subheader py-2 {{ Metronic::printClasses('subheader', false) }}" id="kt_subheader">
    <div
        class="{{ Metronic::printClasses('subheader-container', false) }} d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

        {{-- Info --}}
        @php
            $currentuser = Auth::user();
        @endphp
        <div class="d-flex align-items-center flex-wrap mr-1">
            <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                <span></span>
            </button>
            @if ($currentuser->status == 'pending')
                <span class="font-weight-bold text-danger">
                    Your account is not activated yet.
                    <a href="{{ route('resendEmail') }}">Resend Verification</a>
                </span>
            @elseif($currentuser->status == "suspended")
                <span class="font-weight-bold text-warning">
                    Your account has been suspended.
                </span>
            @elseif($currentuser->status == "blocked")
                <span class="font-weight-bold text-danger">
                    Your account has been blocked.
                </span>
            @endif
            {{-- Page Title --}}
            <h5 class="text-dark font-weight-bold my-2 mr-5">
                {{ @$page_title }}
                @if (isset($page_description) && config('layout.subheader.displayDesc'))
                    <br>
                    <small class="text-muted">{!! @$page_description !!}</small>
                @endif
            </h5>

            @if (!empty($page_breadcrumbs))
                {{-- Separator --}}
                <div class="subheader-separator subheader-separator-ver my-2 mr-4 d-none"></div>

                {{-- Breadcrumb --}}
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2">
                    <li class="breadcrumb-item"><a href="#"><i class="flaticon2-shelter text-muted icon-1x"></i></a>
                    </li>
                    @foreach ($page_breadcrumbs as $k => $item)
                        <li class="breadcrumb-item">
                            <a href="{{ url($item['page']) }}" class="text-muted">
                                {{ $item['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Toolbar --}}
        <div class="d-flex align-items-center">

            @hasSection('page_toolbar')
                @section('page_toolbar')
                    @endif
                </div>
                {{-- Author: Achyut Neupane --}}
                {{-- Subheader button controller --}}
                @if (isset($subhead_button))
                    <div title="Buttons">
                        @foreach ($subhead_button as $button)
                            @if (isset($button['action']))
                                <form action="{{ $button['action'] }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="{{ $button['method'] }}">
                                    <button class="btn btn-{{ $button['class'] }} font-weight-bolder">
                                        {{ $button['text'] }}
                                    </button>
                                    </form>
                                    @else
                                        <a class="btn btn-{{ $button['class'] }} font-weight-bolder" {!!
                                            isset($button['target']) ? 'data-target="' . $button['target']
                                            . '" data-toggle="modal" ' : '' !!}
                                            {{ isset($button['link']) ? "href='" . $button['link'] . "'" : '' }}>
                                            {{ $button['text'] }}
                                        </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
