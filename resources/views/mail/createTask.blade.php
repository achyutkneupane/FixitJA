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
<h2 style="text-align: center;">{{ config('app.name', 'FixitJA') }}</h2>
<div class="container">
    Hello <b>{{ $request->user_name }}</b>,<br><br>
    Thankyou for creating your task <b>{{ $request->name }}</b>.<br><br>
    @if(!auth()->user())
    You will get to view the task details after you <a href="{{ asset('/') }}register" target="_blank">Sign Up</a> using <b>{{ $request->email }}</b> as email-address.<br><br>
    @endif
    <div class="row">
        <h4 class="col-12">Project Details:</h4><br>
        <span class="col-3">Categories:</span>
        <span class="col-9">
            @foreach ($all_cats as $subs)
                @if($loop->last)
                    {{ ucwords($subs->name) }}
                @else
                    {{ ucwords($subs->name).", " }}
                @endif
            @endforeach
        </span>
        <span class="col-3">Title:</span> <span class="col-9">{{ $request->name }}</span>
        <span class="col-3">Description:</span> <span class="col-9">{{ $request->description }}</span>
        <span class="col-3">Project Type: </span> <span class="col-9">{{ ucwords($request->type) }}</span>
        <span class="col-3">Project Payment: </span> <span class="col-9">{{ ucwords($request->payment_type) }}</span>
        <span class="col-3">Project Deadline: </span> <span class="col-9">{{ ucwords($request->deadline) }}</span>
        <span class="col-3">Are you on site while working?</span> <span class="col-9">
            @if ($request->is_client_on_site == 1)
                On Site
            @elseif ($request->is_client_on_site == 0)
                Not On Site
            @else
                <span class="text-muted">N/A</span>
            @endif
        </span>
        <span class="col-3">Are repair parts provided?</span> <span class="col-9">
            @if ($request->is_repair_parts_provided == 1)
                Provided
            @elseif ($request->is_client_on_site == 0)
                Not Provided
            @else
                <span class="text-muted">N/A</span>
            @endif
        </span>
    </div>

    <div class="row">
        <h4 class="col-12">User Details:</h4><br>
        <span class="col-3">Name:</span> <span class="col-9">{{ $request->user_name }}</span>
        <span class="col-3">Email:</span> <span class="col-9">{{ $request->email }}</span>
        <span class="col-3">Phone:</span> <span class="col-9">{{ $request->phone }}</span>
        <span class="col-3">Parish:</span> <span class="col-9">{{ $city->parish->name }}</span>
        <span class="col-3">City:</span> <span class="col-9">{{ $city->name }}</span>
        <span class="col-3">Street Address:</span> <span class="col-9">{{ $request->street_01 }}</span>
        {!! $request->street_02 ? '<span class="col-3"></span> <span class="col-9">' . $request->street_02 . '</span>' : '' !!}
        <span class="col-3">House Number or Unit:</span> <span class="col-9">{{ $request->house_number ? $request->house_number : 'N/A' }}</span>
        <span class="col-3">Postal Code:</span> <span class="col-9">{{ $request->postal_code ? $request->postal_code : '' }}</span>
        <span class="col-3">Is Working Location same as User Location?</span> <span class="col-9">
            @if ($request->user_equal_working)
                Yes
            @else
                No
            @endif
        </span>
    </div>
    @if(!$request->user_equal_working)
        <div class="row">
            <h4 class="col-12">Working Location:</h4><br>
            <span class="col-3">Parish:</span> <span class="col-9">{{ $site_city->parish->name }}</span>
            <span class="col-3">City:</span> <span class="col-9">{{ $site_city->name }}</span>
            <span class="col-3">Street Address:</span> <span class="col-9">{{ $request->site_street_01 }}</span>
            {!! $request->site_street_02 ? '<span class="col-3"></span> <span class="col-9">' . $request->site_street_02 . '</span>' : '' !!}
            <span class="col-3">House Number or Unit:</span> <span class="col-9">{{ $request->site_house_number ? $request->site_house_number : 'N/A' }}</span>
            <span class="col-3">Postal Code:</span> <span class="col-9">{{ $request->site_postal_code ? $request->site_postal_code : '' }}</span>
        </div>
    @endif
</div>