$('#userParishSelect').select2({
    placeholder: "Select a Parish"
});
$('#userCitySelect').select2({
    placeholder: "Select a City"
});
$('#workingParishSelect').select2({
    placeholder: "Select a Parish"
});
$('#workingCitySelect').select2({
    placeholder: "Select a City"
});
$(document).on('change', '#userParishSelect', function (e) {
    const field = $("#userCitySelect");
    field.html('<option label=""></option>');
    var parish_id = $(this).val();
    getCities(field,parish_id);
});
$(document).on('change', '#workingParishSelect', function (e) {
    const field = $("#workingCitySelect");
    field.html('<option label=""></option>');
    var parish_id = $(this).val();
    getCities(field,parish_id);
});
function getCities(field,parish_id)
{
    var cities = new Array();
    $.ajax({
        type: "GET",
        url: '/api/cities/' + parish_id,
        dataType: 'json',
        success: function (result) {
            $.each(result, function (index,item) {
                field.append("<option value='"+item.id+"'>"+item.name+"</option>");
            });
        }
    });
}