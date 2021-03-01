/* for register select jquery */
$(document).ready(function () {
    $('#user_type').on('change', function () {
        console.log('hello');
        var selectedTYPE = $(this).children("option:selected").attr("id");
        console.log(selectedTYPE);
        //alert("You have selected the country - " + selectedTYPE);
        if (selectedTYPE == "type1" || selectedTYPE == "type3") {
            document.getElementById("genders").style.display = "block";
            document.getElementById("webpersonal").style.display = "block";

            document.getElementById("webcompany").style.display = "none";
            document.getElementById("companyname").style.display = "none";
        } else if (selectedTYPE == "type2") {
            document.getElementById("webcompany").style.display = "block";
            document.getElementById("companyname").style.display = "block";

            document.getElementById("genders").style.display = "none";
            document.getElementById("webpersonal").style.display = "none";
        } else {
            document.getElementById("genders").style.display = "none";
            document.getElementById("webpersonal").style.display = "none";
            document.getElementById("webcompany").style.display = "none";
            document.getElementById("companyname").style.display = "none";

        }
    });

    /* for password fields */
    /*$('#psw').on('keypress', function(){
    document.getElementById("passwordinfo").style.display = "block";
});*/

    /* for Profile wizard step 2 */

    $("#selected_catgeory").on('change', function (e) {

        var category_id = $(this).val();
        $('.card-title').attr("category_id");


    });

    /* for dymanic accordance */
    var result_data = '';
    var category = new Array();





    for (var counter = 0; counter < 3; counter++) {
        addAccdorion();
    }

    $("#add_btn").click(addAccdorion);

    function addAccdorion() {
        
 $('#accordion').append(
                    '<div class="card">' +
                    '<div class="card-header">' +
                    '<div class="card-title" data-toggle="collapse" data-target="#collapseOne3"><p id="cat1"></p></div>' +
                    '</div>' +
                    ' <div id="collapseOne3" class="collapse show"' +
                    ' data-parent="#accordionExample3">' +
                    ' <div class="card-body">' +
                    ' <div class="form-group fv-plugins-icon-container"> ' +
                    ' <label>Category</label> ' +
                    ' <select name="skills_category" subcatid="kt_tagify_subcategory" id="selected_catgeory1"  ' +
                    '  class="form-control form-control-solid form-control-lg"> ' +
                    '  <option value="">Select Category </option> ' +
                    '  @foreach ($category as $cate)' +
                    '  <option value=" index  ">item.name ' +
                    '  </option> ' +
                    '  @endforeach ' +

                    ' </select> ' +


                    '<div class="fv-plugins-message-container"></div> ' +

                    ' </div> ' +

                    '<div class="form-group fv-plugins-icon-container"> ' +
                    '  <label>Sub category</label> ' +
                    ' <div> ' +
                    '  <input id="kt_tagify_subcategory" ' +
                    ' class="form-control" name="sub_categories" ' +
                    ' placeholder="Add sub-categories"> ' +
                    ' <div class="mt-3 text-muted">Select multiple ' +
                    ' subcategories. If you don see ' +
                    ' your option just create one.</div> ' +
                    ' </div> ' +
                    ' <div class="fv-plugins-message-container"> ' +
                    '<button type="button" name="add" id="add_btn" class="btn btn-success">Add More</button> ') +

                ' </div> ' +
                ' </div> ' +
                ' </div> ' +
                ' </div>'




       


    }













    $('#remove1').click(function () {
        $('#card_one').empty();
    });
    $('#remove').click(function () {
        $('#card_two').empty();
    });
    $('#remove3').click(function () {
        $('#card_three').empty();
    });

    $('#selected_catgeory1').on('change', function (e) {

            e.preventDefault();
            var data = $(this).children("option:selected").text();
            $("#cat1").html('<p>You  select' + data + ' category</p>')

        }),
        $('#selected_catgeory2').on('change', function (e) {

            e.preventDefault();

            var data = $(this).children("option:selected").text();
            $("#cat2  ").html('<p>You  select' + data + ' category</p>')
        }),
        $('#selected_catgeory3').on('change', function (e) {

            e.preventDefault();
            var data = $(this).children("option:selected").text();
            $("#cat3").html('<p>You  select' + data + ' category</p>')
        }),

        function getCatgeory(categoryId) {
            var subcategory = new Array();
            $.ajax({
                type: "GET",
                url: 'profile/',
                dataType: 'json',
                data: data,
                success: function (data) {

                    data = JSON.parse(data);
                    console.log(data)
                    $('#choosencategory').val(data.name);


                }
            });

        }

    /* for calandar validation */


    var dateControler = {
        currentDate: null
    }

    $('#selectstartdate').on("change", function (e) {
        var now = new Date();
        var selectedDate = new Date($(this).val());
        console.log(selectedDate);


        if (selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }


    })

    $('#selectenddate').on("change", function (e) {

        var now = new Date();
        var selectedDate = new Date($(this).val());
        console.log(selectedDate);


        if (selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }


    });


    /*  for  Range slider */

    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function () {
        output.innerHTML = this.value;
    }












});
