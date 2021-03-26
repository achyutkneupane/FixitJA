{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    @notVerified
        @include('layouts.partials._custom_alert_heading',[
        'alert_type' => 'danger',
        'content' => 'Your account is not activated yet. Please verify your email to activate your account.',
        'has_button' => 'true',
        'button_text' => 'Resend verify link again',
        'button_link' => route('resendEmail')
        ])
    @endnotVerified

    @formToBeFilled
        @include('layouts.partials._custom_alert_heading',[
        'alert_type' => 'danger',
        'content' => 'Please complete your application to become our Fixician and to start earning.',
        'has_button' => 'true',
        'button_text' => 'Complete Application',
        'button_link' => route('profileWizard')
        ])
    @endformToBeFilled

    @notApproved
    @include('layouts.partials._custom_alert_heading',[
    'alert_type' => 'warning',
    'content' => 'Your application is submitted. You can still edit your application. Once we start reviewing your application you have to contact us to change application information.',
    'has_button' => 'true',
    'button_text' => 'Edit Application',
    'button_link' => route('under_construction')
    ])
    @endnotApproved
    <!-- https://preview.keenthemes.com/metronic/demo1/features/bootstrap/alerts.html -->
    <div class="d-flex flex-column-fluid">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')
        </div>
    </div>
@endif
