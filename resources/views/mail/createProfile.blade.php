@component('mail::message')
# {{ $subject }}

Hello <b>{{ $request->name }}</b>,
Thankyou for filling up the application.

# Skills:
@foreach ($user_subcategories as $subs) @if($loop->last) {{ $subs->name }} @else {{ $subs->name }}, @endif @endforeach


# Education Details:

@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Education Institutional Name | {{ $request->educationinstutional_name }} |
| Degree | @if($request->degree) @if($request->degree == 'secondary_level') Secondary Level @elseif($request->degree == 'higher_secondary_level') Higher Secondary Level @elseif($request->degree == 'bachelors') Bachelors @elseif($request->degree == 'masters') Masters @endif @else N/A @endif |
@if($request->start_date && $request->end_date)
| Start Date | {{ $request->start_date }} |
| End Date | {{ $request->end_date }}
@endif
@endcomponent

# Other Informations:
@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Police Report | @if ($request->police_report == 1) Yes @elseif ($request->police_report == 0) No @else N/A @endif |
| Do you wish to travel to site? | @if ($request->is_travelling == 1) Yes @elseif ($request->is_travelling == 0) No @else N/A @endif |
| Description | {{ $request->personal_description }} |
| Working Hours | {{ $request->hours }} hours per week |
@endcomponent

# Address:
@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Parish | {{ $city->parish->name }} |
| City | {{ $city->name }} |
| Street Address | {{ $request->street_01 }} |
@if($request->street_02)
|  | {{ $request->street_02 }} |
@endif
@endcomponent

@component('mail::button', ['url' => route('viewUser',auth()->id())])
View Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
