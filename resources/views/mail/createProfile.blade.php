<!--<style>
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
<h2 style="text-align: center;">{{ config('app.name', 'FixitJA') }}</h2>
<div class="container">
   
    Thankyou for creating your profile <b>.<br><br>
    @if(!auth()->user())
    You will get to view the profile details after you <a href="{{ asset('/') }}register" target="_blank">Sign Up</a> using <b>{{ $request->email }}</b> as email-address.<br><br>
    @endif
    <div class="row">
        <h4 class="col-12">Profiles Details:</h4><br>
        <span class="col-3">Categories:</span>
        <span class="col-9">
            @foreach ($user_subcategories as $subs)
                @if($loop->last)
                    {{ $subs->name }}
              
                @endif
            @endforeach
        </span>
        <h4 class="col-12">Education Information: </h4><br>
        <span class="col-3">Degree:</span> <span class="col-9">{{ $request->description }}</span>
        <span class="col-3">Start Date: </span> <span class="col-9">{{ $request->start_date }}</span>
        <span class="col-3">End Date: </span> <span class="col-9">{{ $request->end_date }}</span>

        <h4 class="col-12"> other information: </h4> <br>
        <span class="col-3">Police Report(yes/no)</span> <span class="col-9">
            @if ($request->police_report == 1)
                yes
            @elseif ($request->police_report == 0)
                no
            @else
                <span class="text-muted">N/A</span>
            @endif
        </span>
        <span class="col-3">Do you want to travelling(yes/no)</span> <span class="col-9">
            @if ($request->is_travelling == 1)
                yes
            @elseif ($request->is_travelling == 0)
                no
            @else
                <span class="text-muted">N/A</span>
            @endif
        </span>
        <span class="col-3">Description: </span> <span class="col-9">{{ $request->personal_description }}</span>
        <span class="col-3">Working Hours: </span> <span class="col-9">{{ $request->hours }}</span>
    </div>

    <div class="row">
        <h4 class="col-12">Address:</h4><br>
        
       
        <span class="col-3">Street Address:</span> <span class="col-9">{{ $request->street}}</span>
    </div>
</div>-->
<br><br>
Welcome {{ config('app.name', 'FixitJA') }}!
<br>
Thank you for submitted profile details.
<br><br>



<br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }}
