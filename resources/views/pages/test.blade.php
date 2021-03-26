@extends('layouts.app')
@section('content')
@if(!empty(auth()->user()->city->name))
<script>
var cityId = {{ auth()->user()->city->id }};
</script>
@else
<script>
var cityId = '';
</script>
@endif
<select class="form-control select2" id="parishSelect" name="parish">
    <option label=""></option>
    @foreach($parishes as $parish)
    <option value="{{ $parish->id }}"{{ !empty(auth()->user()->city->parish) && $parish->id == auth()->user()->city->parish->id ? ' selected' : '' }}>
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
@section('scripts')
<script>
    $('#parishSelect').select2({
        placeholder: "Select a Parish"
    });
    $('#citySelect').select2({
        placeholder: "Select a City"
    });
    if($("select[id='parishSelect'] option:selected").val()) {
        var parish_id = $("select[id='parishSelect']").val();
        getCities(parish_id,cityId);
    }
    else {
        $(document).on('change', '#parishSelect', function (e) {
            $("#citySelect").html('<option label=""></option>');
            var parish_id = $(this).val();
            getCities(parish_id);
        });
    }
    function getCities(parish_id,city = '')
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
                bindCities(cities,city);
            }
        });
    }
    function bindCities(cities,city) {
        cities.forEach((element,index) => {
            if(city == element.id)
            $("#citySelect").append("<option value='"+element.id+"' selected>"+element.name+"</option>");
            else
            $("#citySelect").append("<option value='"+element.id+"'>"+element.name+"</option>");
        });
    }
</script>
@endsection
