<style>
    .container {
        width: 100vw;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
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
    <h2 style="text-align: center;">{{ config('app.name', 'FixitJA') }}</h2>
    <div class="container">
        <div class="row">
            <div class="col-12">Hello there,<br><br></div>
            <div class="col-12">You have been invited to <a href="{{ asset('/') }}">FixitJA</a> by <b>{{ auth()->user()->name }}</b>({{ auth()->user()->email() }}).<br><br></div>
            <div class="col-12">Click on <a href="{{ route('registerWithToken',$refer->token) }}">this link</a> to register to <a href="{{ asset('/') }}">FixitJA</a>.</div>
            <br><br>
            <div class="col-12">Thankyou</div>
        </div>
    </div>