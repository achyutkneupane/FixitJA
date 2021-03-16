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
        <div class="col-12">
            Email from <b>{{ $request->name }}</b>
            (<a href="mailto:{{ $request->email }}"><i>{{ $request->email }}</i></a>).
        </div>
        <div class="col-12">
            Message:<br>
            {{ $request->message }}
        </div>
    </div>
</div>