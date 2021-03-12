// var category_id1, category_id2, category_id3;
var projectWizardCount = 0;
var selectedCategoryData = {};
$(document).ready(function () {
    AddCategoryProjectWizard();
});
$(document).on('change', '.project_category_select', function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    selectedCategoryData[$(this).attr("id")] = $(this).val();
    var category_id = $(this).val();
    var subcatid = this.getAttribute('subcatid');
    if (!category_id) {
        $("#categoryTitle" + $(this).attr('id') + "").html("");
        $('#divTagify' + subcatid).hide();
        return;
    }
    var data = $(this).children("option:selected").text();
    $("#projectWizardCategoryTitle" + $(this).attr('id') + "").html(data);

    $('#divTagify' + subcatid).show();
    if ($('#divTagify' + subcatid + '').find('tags').length > 0) {
        $('#divTagify' + subcatid + '').find('tags').remove();
    }
    updateAllCategorySelect();
    CategoryProjectWizardFV.addField($("#" + subcatid).attr("name"), sub_categories_project_wizard);
    getSubCatData(category_id, subcatid);
});

//update category in all select after changes --Mahesh
function updateAllCategorySelect() {
    $( ".project_category_select" ).each(function() {
        var selectID = $(this).attr("id");
        $("#" + selectID + " option").prop("disabled", false);
        $.each(selectedCategoryData, function (id, val) {
            $("#" + selectID + " option[value="+ val +"]").prop("disabled", true);
        });
    });
}

function getSubCatData(categoryId, subcatid) {
    var subcategory = new Array();
    $.ajax({
        type: "GET",
        url: '/api/category/' + categoryId,
        dataType: 'json',
        success: function (result) {
            $.each(result, function (index, item) {
                var itemObj = {};
                itemObj.value = item.name;
                itemObj.initials = '';
                itemObj.initialsState = '';
                itemObj.id = item.id;
                itemObj.description = item.description;
                itemObj.class = 'tagify__tag--primary';
                subcategory.push(itemObj);
            });
            bindSubCat(subcategory, subcatid);
        }
    });
}
function bindSubCat(data, subcat) {
    var toEl = document.getElementById(subcat);
    var tagifyTo = new Tagify(toEl, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
        whitelist: data,
        templates: {
            dropdownItem: function (tagData) {
                try {
                    var html = '';

                    html += '<div class="tagify__dropdown__item">';
                    html += '   <div class="d-flex align-items-center">';
                    html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                    // html += '           <span class="symbol-label" style="background-image: url(\'' + (tagData.pic ? tagData.pic : '') + '\')">' + (tagData.initials ? tagData.initials : '') + '</span>';
                    html += '       </span>';
                    html += '       <div class="d-flex flex-column">';
                    html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold text-capitalize">' + (tagData.value ? tagData.value : '') + '</a>';
                    html += '           <span class="text-muted font-weight-bold text-capitalize">' + (tagData.description ? tagData.description : '') + '</span>';
                    html += '       </div>';
                    html += '   </div>';
                    html += '</div>';

                    return html;
                } catch (err) { }
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            searchKeys:['value','description'],
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        }
    });
    if(sessionSubCatId) {
        data.forEach((element) => {
            if(sessionSubCatId == element.id) {
                $("#" + subcat).val(element);
            }
        });
    }
}

//Adding more category
$("#subCategoryAddButtonProjectWizard").click(function (e) {
    e.stopImmediatePropagation();
    AddCategoryProjectWizard();
});

function AddCategoryProjectWizard() {
    var totalCategory = $(".card-category-accordion-project-wizard").length;
    if (totalCategory < 4) {
        projectWizardCount++;
        const cloneProjectWizardCategory = $("#templateProjectWizardCategory").clone();
        cloneProjectWizardCategory.attr("id", "ProjectWizardCategory" + projectWizardCount);
        $("#totalCatList").val($("#totalCatList").val() + '{"fieldId": "' + projectWizardCount + '"},');

        var categoryCard = cloneProjectWizardCategory.find("#subCategoryTemplate_selector");
        categoryCard.attr("id", "subCategory_selector" + projectWizardCount);

        var subCategoryTitleDiv = cloneProjectWizardCategory.find("#subCategoryTemplateTitleDiv");
        subCategoryTitleDiv.attr("id", "subCategoryTitleDiv" + projectWizardCount);
        subCategoryTitleDiv.attr("data-target", "#collapseSubCat" + projectWizardCount);

        var projectWizardCategoryTitle = cloneProjectWizardCategory.find("#projectWizardCategoryTemplateTitle");
        projectWizardCategoryTitle.attr("id", "projectWizardCategoryTitlecategorySelect" + projectWizardCount);

        var collapseSubCat = cloneProjectWizardCategory.find("#collapseSubCatTemplate");
        collapseSubCat.attr("id", "collapseSubCat" + projectWizardCount);

        var categorySelect = cloneProjectWizardCategory.find("#categorySelectTemplate");
        categorySelect.attr("id", "categorySelect" + projectWizardCount);
        categorySelect.attr("subcatid", "kt_tagify_subCat_project_wizard" + projectWizardCount);
        categorySelect.attr("name", "categoryTemplate" + projectWizardCount);

        var divTagifykt_tagify_subCat_project_wizard = cloneProjectWizardCategory.find("#divTagifykt_tagify_subCat_project_wizard_Template");
        divTagifykt_tagify_subCat_project_wizard.attr("id", "divTagifykt_tagify_subCat_project_wizard" + projectWizardCount);

        var kt_tagify_subCat_project_wizard = cloneProjectWizardCategory.find("#kt_tagify_subCat_project_wizard_Template");
        kt_tagify_subCat_project_wizard.attr("id", "kt_tagify_subCat_project_wizard" + projectWizardCount);
        kt_tagify_subCat_project_wizard.attr("name", "sub_categories" + projectWizardCount);

        var project_wizard_footer = cloneProjectWizardCategory.find("#project_wizard_footer");
        project_wizard_footer.attr("id", "project_wizard_footer" + projectWizardCount);

        if (totalCategory > 1) {
            var remove_btn_project_wizard = cloneProjectWizardCategory.find("#remove_btn_project_wizard");
            remove_btn_project_wizard.attr("id", "remove_btn_project_wizard" + projectWizardCount);
            remove_btn_project_wizard.attr("categoryInfo", "subCategory_selector" + projectWizardCount);
            remove_btn_project_wizard.attr("count-value", projectWizardCount);
        }
        else {
            project_wizard_footer.remove();
        }

        cloneProjectWizardCategory.show();
        $("#divProjectWizardCategory").append(cloneProjectWizardCategory);
        CategoryProjectWizardFV.addField("categoryTemplate" + projectWizardCount, skills_category_project_wizard);
        if (totalCategory > 2) {
            $("#subCategoryAddButtonProjectWizard").hide();
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
    if(sessionCatId) {
        $("#categorySelect1").val(sessionCatId).change();
    }
    else if(sessionSubCatId) {
        $("#categorySelect1").val(sessionsubCatCatId).change();
    }
}

//Removing added category
$(document).on("click", ".remove-accordian-project-wizard", function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    CategoryProjectWizardFV.removeField('categoryTemplate' + $(this).attr('count-value'));
    if ($("#divTagifykt_tagify_subCat_project_wizard" + $(this).attr('count-value')).is(':visible')) {
        CategoryProjectWizardFV.removeField('sub_categories' + $(this).attr('count-value'));
    }
    $("#" + $(this).attr('categoryInfo')).remove();
    if ($(".card-category-accordion-project-wizard").length < 4) {
        $("#subCategoryAddButtonProjectWizard").show();
    }

    selectedCategoryData['categorySelect' + $(this).attr('count-value')] = "-1";
    updateAllCategorySelect();
    $("#totalCatList").val($("#totalCatList").val().replace('{"fieldId": "' + $(this).attr('count-value') + '"},', ''));
})

function workingEqualsUser() {
    var check = document.getElementById("locationCheck").checked;
    if (!check) {
        $(".workingLocationReview").css({ display: "block" });
        $("#workingLocation").css({ display: "block" });
        $("#workingEqualUserId").text("No");
        return check;
    }
    else {
        $(".workingLocationReview").css({ display: "none" });
        $("#workingLocation").css({ display: "none" });
        $("#workingEqualUserId").text("Yes");
        return check;
    }
}
