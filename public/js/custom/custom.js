/* for register select jquery */

var category_data;
var selectcategoryid = "selected_catgeory1";
var count = 1;
$(document).ready(function () {
    $('#user_type').on('change', function () {
        var selectedTYPE = $(this).children("option:selected").attr("id");
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


        if (selectedDate > now) {
            $(this).val(dateControler.currentDate)
        } else {
            dateControler.currentDate = $(this).val();
        }


    })

    $('#selectenddate').on("change", function (e) {

        var now = new Date();
        var selectedDate = new Date($(this).val());


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

//Adding more category
$("#add_btn").click(function (e) {
    e.stopImmediatePropagation();
    if ($(".card-category-accordion").length < 3) {
        count++;
        var selectcategoryid = "selected_catgeory" + count;
        var subcatid = "kt_tagify_subcategory" + count;
        var viewcategory = "categoryTitle" + selectcategoryid;
        console.log(selectcategoryid);
        var category_select = "";
        $.each(category_data, function (index, item) {
            category_select = category_select + ('<option value="' + item.id + '">' + item.name + ' </option>');
        });
        $('#accordion_category').append(
            '<div class="card card-category-accordion" id="categoryCard' + count + '">' +
            '<div class="card-header">' +
            '<div class="card-title" data-toggle="collapse" data-target="#collapse' + count + '"><span class="category-title" id="' + viewcategory + '"></span></div>' +
            '</div>' +
            ' <div id="collapse' + count + '" class="collapse show"' +
            ' data-parent="#accordionExample3">' +
            ' <div class="card-body">' +
            ' <div class="form-group fv-plugins-icon-container"> ' +
            ' <label>Category</label> ' +
            ' <select name="skills_category' + count + '" subcatid="' + subcatid + '" id= "' + selectcategoryid + '"`  ' +
            '  class="form-control form-control-solid form-control-lg category-select"> ' +
            '  <option value="">Select Category</option> ' +
            category_select +
            ' </select> ' +
            '<div class="fv-plugins-message-container"></div> ' +
            ' </div> ' +

            '<div class="form-group fv-plugins-icon-container"> ' +
            '  <label>Sub category</label> ' +
            ' <div id = "divTagify' + subcatid + '"> ' +
            '  <input id="' + subcatid + '" ' +
            ' class="form-control" name="sub_categories[]' + count + '" ' +
            ' placeholder="Add sub-categories"> ' +
            ' <div class="mt-3 text-muted">Select multiple ' +
            ' subcategories. If you don see ' +
            ' your option just create one.</div> ' +
            ' </div> ' +
            ' <div class="fv-plugins-message-container"> ' +
            ' </div> ' +
            ' </div> ' +
            ' <div class="card-footer bg-transparent py-5"> ' +
            ' <button type="button" name="categoryCard' + count + '" countValue=' + count + ' id="remove_btn" class="btn btn-danger remove-accordian">Remove</button>' +
            ' </div> ' +
            ' </div> ' +
            ' </div>'
        )
        //adding dynamic validator
        CategoryFV.addField('skills_category' + count + '', skills_category)
            .addField('sub_categories' + count + '', sub_categories);
        if ($(".card-category-accordion").length == 3) {
            $("#add_btn").hide();
        }

    }
    else {
        Swal.fire({
            text: "Cannot add more than 3 categories!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn font-weight-bold btn-primary",
            }
        });
    }
})

//Removing added category
$(document).on("click", ".remove-accordian", function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    $("#" + $(this).attr('name')).remove();
    CategoryFV.removeField('skills_category' + $(this).attr('countValue') + '')
        .removeField('sub_categories' + $(this).attr('countValue') + '');
    if ($(".card-category-accordion").length < 3) {
        $("#add_btn").show();
    }
})

//Adding more Reference
$("#add_more_reference").click(function(e){
    e.stopImmediatePropagation();
    if ($(".card-reference-accordion").length < 3){
        count++;

        $("#accordion_reference").append(
            '<div class="card card-reference-accordion" id="referenceCard ' + count + '">'+
            '<div class="card-header">'+
                '<div class="card-title" data-toggle="collapse' + count + '" data-target="#collapse2">'+
                    '<span class="glyphicon glyphicon-remove-circle pull-right "></span>'+
                    '</div>'+
                    '</div>'+
                    '<div id="collapse2 ' + count + '" class="collapse show" data-parent="#accordionExample3">'+
                     '<div class="card-body">'+
                     '<div class="form-group">'+
                     '<label class="font-size-h6 font-weight-bolder text-dark">Referal Name'+
                     '<input type="text" id="refname" class="form-control"  type="text" name="referal_name'+ count +'" placeholder="Referal Name" value="">'+
                     '</label>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label class="font-size-h6 font-weight-bolder text-dark">Referal Email'+
                            '<input type="email" id="refemail" class="form-control"  type="email" name="referal_email'+ count +'" placeholder="Referal Email" value="">'+
                        '</label>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label class="font-size-h6 font-weight-bolder text-dark">Referal Contact Number'+
                            '<input type="text" id="refphone" class="form-control"  type="text" name="referal_phone'+ count +'" placeholder="Referal Contact Number" value="">'+
                        '</label>'+
                    '</div>'+
                    ' <div class="fv-plugins-message-container"> ' +
                    ' </div> ' +
                    ' </div> ' +
                    ' <div class="card-footer bg-transparent py-5"> ' +
                    ' <button type="button" name="referenceCard' + count + '" countValue1=' + count + ' id="remove_btn1" class="btn btn-danger remove-accordian_remove">Remove</button>' +
                   '</div>'+
            '</div>'


        )

        //Adding dynamic validator
        ReferencFv.addField('referal_name' + count + '', referal_name)
         .addField('referal_email' + count + '', referal_email)
         .addField('referal_phone' + count + '', referal_phone);
        if ($(".card-reference-accordion").length == 3) {
            $("#add_more_reference").hide();
        }
    }
    else{
        Swal.fire({
            text: "Cannot add more than 3 references!",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn font-weight-bold btn-primary",
            }
        });

    }
})

//Removing  add Referneces
$(document).on("click", ".remove-accordian_remove", function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    $("#" + $(this).attr('name')).remove();
    ReferencFv.removeField('referal_name' + $(this).attr('countValue1') + '')
        .removeField('referal_email' + $(this).attr('countValue1') + '')
        .removeField('referal_phone' + $(this).attr('countValue1') + '');

        if ($(".card-reference-accordion").length < 3) {
            $("#add_more_reference").show();
        }


        

   
})


//Adding selected category in the accordion title
$(document).on('change', '.category-select', function (e) {
    var data = $(this).children("option:selected").text();
    $("#categoryTitle" + $(this).attr('id') + "").html(data);
})

//Change certificate wizard if category is changed later
var clearSecondWizard = false;
$("#accordion_category").bind("DOMSubtreeModified", CustomHandler);
function CustomHandler(e){
    e.stopImmediatePropagation();
    clearSecondWizard = true;
}

var categorySelected = []; //array for storing validator name to remove validator dynamically

//Load certificate wizard data on clicking next
function LoadWizardData(wizard) {
    if (wizard.getStep() == 2 && wizard.lastStep == 1 && clearSecondWizard) {
        clearSecondWizard = false;
        $("#certificateSection").empty();
        categorySelected.forEach(item => {
            CertificateFV.removeField(item);
        });
        categorySelected = [];
        $.each($(".category-title"), function (index, value) {

            const cloneCertificateAccordion = $("#templateCertificate").clone();
            cloneCertificateAccordion.attr("id", "certificateAccordion" + index);
            cloneCertificateAccordion.show();

            var cardTitle = cloneCertificateAccordion.find("#certificateCategoryTitle");
            cardTitle.html(value.innerHTML);
            cardTitle.attr("id", "certificateCategoryTitle" + index);

            var certificateFile = cloneCertificateAccordion.find("#certificateFile");
            certificateFile.attr("id", "certificateFile" + index);
            certificateFile.attr("name", "certificate" + index);

            var certificateExp = cloneCertificateAccordion.find("#certificateExp");
            certificateExp.attr("id", "certificateExp" + index);
            certificateExp.attr("name", "experience" + index);

            var accordionCertificate = cloneCertificateAccordion.find("#accordionCertificate");
            accordionCertificate.attr("id", "accordionCertificate" + index);

            var selectedCategory = cloneCertificateAccordion.find("#selectedCategory");
            selectedCategory.attr("id", "selectedCategory" + index);
            selectedCategory.attr("data-target", "#collapseCert" + index)

            var collapseCert = cloneCertificateAccordion.find("#collapseCert");
            collapseCert.attr("id", "collapseCert" + index);
            collapseCert.attr("data-parent", "#accordionCertificate" + index)

            $("#certificateSection").append(cloneCertificateAccordion);
            categorySelected.push("certificate" + index);
            categorySelected.push("experience" + index);

            //Adding dynamic validator
            CertificateFV.addField("certificate" + index, certificateValidator)
            .addField("experience" + index, experienceValidator);
        });
    }
}
