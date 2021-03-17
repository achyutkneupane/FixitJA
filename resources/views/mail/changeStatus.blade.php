<style>
    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        width: 992px !important;
    }
    
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        width: 100%;
    }
    
    .col-3 {
        flex: 0 0 25%;
        max-width: 25%;
        font-weight: 700 !important;
    }
    
    .col-9 {
        flex: 0 0 75%;
        max-width: 75%;
        color: #6c757d !important;
        font-weight: 300;
    }
    .col-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    </style>
<div class="container">
    <div class="row">
        <h2 class="col-12" style="text-align: center;">
            {{ config('app.name', 'FixitJA') }}
        </h2>
        @if($status == "deactivated")
        <div class="col-12">
            Hello {{ $user->name }},<br>
            Your account has been deactivated.<br><br>
            You can re-activate your account by <a href="{{ asset('/') }}login">logging in<a>.<br><br>
            With Regards,<br>
            FixitJA Team
        </div>
        @endif
        @elseif($status == "deleted")
        <div class="col-12">
            Hello {{ $user->name }},<br>
            Your account has been deleted from <a href="{{ asset('/') }}">FixitJA</a>.<br><br>
            With Regards,<br>
            FixitJA Team
        </div>
        @endif
        @elseif($status == "suspended")
        <div class="col-12">
            Hello {{ $user->name }},<br>
            Your account has been suspended from <a href="{{ asset('/') }}">FixitJA</a>.<br><br>
            You can <a href="{{ asset('/') }}contact">Contact Us</a> if you think there was some mistakes.<br><br>
            With Regards,<br>
            FixitJA Team
        </div>
        @endif
        @elseif($status == "blocked")
        <div class="col-12">
            Hello {{ $user->name }},<br>
            Your account has been blocked from <a href="{{ asset('/') }}">FixitJA</a>.<br><br>
            You can <a href="{{ asset('/') }}contact">Contact Us</a> if you think there was some mistakes.<br><br>
            With Regards,<br>
            FixitJA Team
        </div>
        @endif
    </div>
</div>