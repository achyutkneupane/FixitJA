{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    @include('layouts.partials._custom_alert_heading', ['email_not_verified' => 'true'])
    @include('layouts.partials._custom_alert_heading', ['applicaiton_not_complete' => 'true'])
    <div class="d-flex flex-column-fluid">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')
        </div>
    </div>
@endif
