$('#userParishSelect').select2({
    placeholder: "Select a Parish"
});
$('#userCitySelect').select2({
    placeholder: "Select a Cityy"
});
$('#workingParishSelect').select2({
    placeholder: "Select a Parish"
});
$('#workingCitySelect').select2({
    placeholder: "Select a City"
});
if ($("select[id='userParishSelect'] option:selected").val()) {
    const field = $("#userCitySelect");
    var parish_id = $("select[id='userParishSelect']").val();
    getCities(field, parish_id, cityId);
}
$(document).on('change', '#userParishSelect', function(e) {
    const field = $("#userCitySelect");
    field.html('<option label=""></option>');
    var parish_id = $(this).val();
    getCities(field, parish_id);
});
if ($("select[id='workingParishSelect'] option:selected").val()) {
    const field = $("#workingCitySelect");
    var parish_id = $("select[id='workingParishSelect']").val();
    getCities(field, parish_id, workingCityId);
}
$(document).on('change', '#workingParishSelect', function(e) {
    const field = $("#workingCitySelect");
    field.html('<option label=""></option>');
    var parish_id = $(this).val();
    getCities(field, parish_id);
});

function getCities(field, parish_id, city = '') {
    $.ajax({
        type: "GET",
        url: '/api/cities/' + parish_id,
        dataType: 'json',
        success: function(result) {
            $.each(result, function(index, item) {
                if (city == item.id)
                    field.append("<option value='" + item.id + "' selected>" + item.name + "</option>");
                else
                    field.append("<option value='" + item.id + "'>" + item.name + "</option>");
            });
        }
    });
}