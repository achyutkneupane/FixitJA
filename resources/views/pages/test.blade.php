@extends('layouts.app')
@section('content')
<select class="form-control select2" id="parishSelect" name="parish">
    <option label=""></option>
    @foreach($parishes as $parish)
    <option value="{{ $parish->id }}">
        {{ $parish->name }}
    </option>
    @endforeach
</select>
<div class="form-group fv-plugins-icon-container">
    <!--begin::Select-->
    <label>City</label>
    <select class="form-control select2" id="citySelect" name="city">
        <option label=""></option>
    </select>
    <span class="form-text text-muted">Please enter your City</span>
    <div class="fv-plugins-message-container"></div>
    <!--end::Select-->
</div>
@endsection
@section('styles')
<link href="{{ asset('css/custom/create-project-wizard-custom.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
<script
    src="{{ asset('js/custom/create-project-wizard-custom.js') }}" type="text/javascript">
</script>
<script
    src="{{ asset('js/custom/create-project-tagify.js') }}" type="text/javascript">
</script>
<script>
    $('#parishSelect').select2({
        placeholder: "Select a Parish"
    });
    $('#citySelect').select2({
        placeholder: "Select a City"
    });
    $(document).on('change', '#parishSelect', function (e) {
        $("#citySelect").html('<option label=""></option>');
        var parish_id = $(this).val();
        getCities(parish_id);
    });
    function getCities(parish_id)
    {
        var cities = new Array();
        $.ajax({
            type: "GET",
            url: '/api/cities/' + parish_id,
            dataType: 'json',
            success: function (result) {
                $.each(result, function (index, item) {
                    var itemObj = {};
                    itemObj.id = item.id;
                    itemObj.name = item.name;
                    cities.push(itemObj);
                });
                bindCities(cities);
            }
        });
    }
    function bindCities(cities) {
        cities.forEach((element,index) => {
            $("#citySelect").append("<option value='"+element.id+"'>"+element.name+"</option>");
        });
    }
</script>
@endsection
