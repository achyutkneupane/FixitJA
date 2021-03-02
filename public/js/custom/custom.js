/* for register select jquery */

var category_data;
var selectcategoryid = "selected_catgeory" +count;
var count = 0;

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




    $.ajax({
        type: 'GET',
        url: '/category_data',
        dataType: 'json',
        success: function (response) {
            //var response = JSON.parse(response);
            category_data = response;
        }
    });







    $('#remove1').click(function () {
        $('#card_one').empty();
    });
    $('#remove').click(function () {
        $('#card_two').empty();
    });
    $('#remove3').click(function () {
        $('#card_three').empty();
    });

   
      
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
$("#add_btn").click(function (e) {

    if( count = 1, count <= 3, count++)
    {
         e.stopImmediatePropagation();
    var selectcategoryid = "selected_catgeory" +count;
    var subcatid = "kt_tagify_subcategory" + count;
    var viewcategory = "selectedCatehroy" +count;
    console.log(selectcategoryid);
    var category_select = "";
     $.each(category_data, function (index, item) {
        category_select = category_select + ('<option value="' + item.id + '">' + item.name +' </option>');
    });
    //console.log(sub);
    $('#accordion_category').append(
        '<div class="card">' +
        '<div class="card-header">' +
        '<div class="card-title" data-toggle="collapse" data-target="#collapseOne3"><p class="'+viewcategory+'"></p></div>' +
        '</div>' +
        ' <div id="collapseOne3" class="collapse show"' +
        ' data-parent="#accordionExample3">' +
        ' <div class="card-body">' +
        ' <div class="form-group fv-plugins-icon-container"> ' +
        ' <label>Category</label> ' +
        ' <select name="skills_category[]" subcatid="'+ subcatid +'" id= "'+ selectcategoryid +'"`  ' +
        '  class="form-control form-control-solid form-control-lg category-select"> ' +
        '  <option>Select Category</option> ' +
        category_select +

        ' </select> ' +


        '<div class="fv-plugins-message-container"></div> ' +

        ' </div> ' +

        '<div class="form-group fv-plugins-icon-container"> ' +
        '  <label>Sub category</label> ' +
        ' <div id = divTagify '+subcatid+'> ' +
        '  <input id="'+ subcatid +'" ' +
        ' class="form-control" name="sub_categories" ' +
        ' placeholder="Add sub-categories"> ' +
        ' <div class="mt-3 text-muted">Select multiple ' +
        ' subcategories. If you don see ' +
        ' your option just create one.</div> ' +
        ' </div> ' +
          ' <button type="button" name="remove" id="remove_btn" class="btn btn-danger remove-accordian" style="float:right"><i class="far fa-times-circle"></i></button>'+
        ' <div class="fv-plugins-message-container"> ' +
       


        ' </div> ' +
        ' </div> ' +
        ' </div> ' +
        ' </div>' 
       )
        
    }
   
   




})

 $(document).on("click", ".remove-accordian", function (e) {
     e.preventDefault();
     
      $(this).parent(). parent().parent().parent().remove();  // remove input field
     
    })


 $(document).on('change', '.category-select', function(e){
     

       
            var data = $(this).children("option:selected").text();
            $(".viewcategory").html(data);
             $("#skilledcertificate").empty();
            $("#skilledcertificate").append(
                '<div class="card-body">'+
                                       
                                        '<div class="accordion accordion-solid accordion-toggle-plus"'+
                                            'id="accordionExample4">'+
                                           '<div class="card">'+
                                               '<div class="card-header" id="headingOne3">'+
                                                    '<div class="card-title" data-toggle="collapse"'+
                                                       'data-target="#collapseOne3" id="selected-category">'+
                                                        '<p id="sc1"></p>'+
                                                   '</div>'+
                                               '</div>'+
                                                '<div id="collapseOne3" class="collapse show"'+
                                                    'data-parent="#accordionExample3">'+
                                                    '<div class="card-body">'+
                                                        '<div class="form-group row">'+
                                                            '<label'+
                                                                'class="col-form-label col-lg-3 col-sm-12 text-lg-right">Certificate</label>'+
                                                            ' <div class="col-lg-4 col-md-9 col-sm-12">'+
                                                                '<div class="dropzone dropzone-default dropzone-primary"'+
                                                                    'id="kt_dropzone_2">'+
                                                                    '<div class="dropzone-msg dz-message needsclick">'+
                                                                        '<input type="file" name="certificate"'+
                                                                            'accept=".png, .jpg, .jpeg, .pdf, .docx" />'+
                                                                   '</div>'+
                                                                '</div>'+
                                                           '</div>'+
                                                        '</div>'+

                                                        '<div class="form-group">'+
                                                            '<label'+
                                                                'class="font-size-h6 font-weight-bolder text-dark">Expereince</label>'+
                                                            '<input type="text" class="form-control " name="expereince"'+
                                                                'placeholder="experience"'+
                                                                'value="" />'+
                                                            
                                                           '<span'+
                                                                '</span>'+
                                                            
                                                       '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                             '</div>'+
'</div>'+

                                 '</div>'


            )

        })
