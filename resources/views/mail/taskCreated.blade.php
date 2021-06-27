@component('mail::message')

Thankyou for creating your task.
@if(!auth()->user())
You can view your project details after you register on {{ config('app.name') }} platform using the the same email {{ $email_data['request']->email }}.
@component('mail::button', ['url' => route('register')])
Sign Up
@endcomponent
@endif

# Project Details
@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Title | {{ $email_data['request']->name }} |
| Description | {{ $email_data['request']->description }} |
| Type | {{ ucwords($email_data['request']->type) }} |
| Payment | {{ ucwords($email_data['request']->payment_type) }} |
| Deadline | {{ ucwords($email_data['request']->deadline) }} |
| On Site? | @if ($email_data['request']->is_client_on_site == 1) On Site @elseif ($email_data['request']->is_client_on_site == 0) Not On Site @else <span class="text-muted">N/A</span> @endif |
| Repairs Parts? | @if ($email_data['request']->is_repair_parts_provided == 1) Provided @elseif ($email_data['request']->is_client_on_site == 0) Not Provided @else <span class="text-muted">N/A</span> @endif |
@endcomponent

# User Details

@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Name | {{ $email_data['request']->user_name }} |
| Email | {{ $email_data['request']->email }} |
| Phone | {{ $email_data['request']->phone }} |
| Parish | {{ $email_data['city']->parish->name }} |
| City | {{ $email_data['city']->name }} |
| Street Address | {{ $email_data['request']->street_01 }}{!! $email_data['request']->street_02 ? '<br>'.$email_data['request']->street_02 : '' !!} |
| House Number | {{ $email_data['request']->house_number ? $email_data['request']->house_number : 'N/A' }} |
| Postal Code | {{ $email_data['request']->postal_code ? $email_data['request']->postal_code : 'N/A' }} |
@endcomponent

@if(!$email_data['request']->user_equal_working)
# Working Location

@component('mail::table')
| Name       | Value         |
| ------------- |-------------|
| Parish | {{ $email_data['site_city']->parish->name }} |
| City | {{ $email_data['site_city']->name }} |
| Street Address | {{ $email_data['request']->site_street_01 }}{!! $email_data['request']->site_street_02 ? '<br>'.$email_data['request']->site_street_02 : '' !!} |
| House Number | {{ $email_data['request']->site_house_number ? $email_data['request']->site_house_number : 'N/A' }} |
| Postal Code | {{ $email_data['request']->site_postal_code ? $email_data['request']->site_postal_code : 'N/A' }} |
@endcomponent
@else
#Working Location same as User Location
@endif

@component('mail::button', ['url' => route('listTask')])
View Task
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent