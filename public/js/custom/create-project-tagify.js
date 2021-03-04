var category_id1,category_id2,category_id3;
function bindSubCat1(subcat_data) {
    jQuery(document).ready(function () {
        var toEl = document.getElementById('kt_tagify_sub1');
            var tagifyTo = new Tagify(toEl, {
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 10,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: subcat_data,
                templates: {
                    dropdownItem: function (tagData) {
                        try {
                            var html = '';

                            html += '<div class="tagify__dropdown__item">';
                            html += '   <div class="d-flex align-items-center">';
                            html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                            html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                            html += '       </span>';
                            html += '       <div class="d-flex flex-column">';
                            html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                            html += '           <span class="text-muted font-weight-bold">' + (tagData.description ? tagData.description : '') + '</span>';
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
                    classname: "color-blue",
                    enabled: 0,
                    maxItems: 5
                }
            });
    });
}
$(document).on('change','.profile_category1_select', function (e) {
    document.getElementById("category1_selector").style.display = "none";
    document.getElementById("subCategory1_label").innerHTML =  $('.profile_category1_select option:selected').text();
    document.getElementById("subCategory1_selector").style.display = "block";
    document.getElementById("subCategoryAddButton2").style.display = "block";

    e.preventDefault();
    var result;
    category_id1 = $(this).val();
    document.getElementById("category1").value = category_id1;
    getSubCatData1(category_id1);
});


function getSubCatData1(categoryId1) {
    var subcategory = new Array();
    $.ajax({
        type: "GET",
        url: '/api/category/' + categoryId1,
        dataType: 'json',
        success: function (result) {
            $.each(result, function (index, item) {
                var itemObj = {};
                itemObj.value = item.name;
                itemObj.description = item.description;
                itemObj.id = item.id;
                itemObj.initials = '',
                itemObj.initialsState = '',
                itemObj.class = 'tagify__tag--secondary'
                subcategory.push(itemObj);
            });
             bindSubCat1(subcategory);
        }
    });
}






// For Category 2

function addCategory2()
{
    $(".profile_category2_select option[value=" + category_id1 + "]").remove();
    $(".profile_category3_select option[value=" + category_id1 + "]").remove();
    document.getElementById("subCategoryAddButton2").style.display = "none";
    document.getElementById("categorySection2").style.display = "block";
}

function bindSubCat2(subcat_data) {
    jQuery(document).ready(function () {
        var toEl = document.getElementById('kt_tagify_sub2');
            var tagifyTo = new Tagify(toEl, {
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 10,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: subcat_data,
                templates: {
                    dropdownItem: function (tagData) {
                        try {
                            var html = '';

                            html += '<div class="tagify__dropdown__item">';
                            html += '   <div class="d-flex align-items-center">';
                            html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                            html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                            html += '       </span>';
                            html += '       <div class="d-flex flex-column">';
                            html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                            html += '           <span class="text-muted font-weight-bold">' + (tagData.description ? tagData.description : '') + '</span>';
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
                    classname: "color-blue",
                    enabled: 0,
                    maxItems: 5
                }
            });
    });
}

$(document).on('change','.profile_category2_select', function (e) {
    document.getElementById("category2_selector").style.display = "none";
    document.getElementById("subCategory2_label").innerHTML = $('.profile_category2_select option:selected').text();
    document.getElementById("subCategory2_selector").style.display = "block";
    document.getElementById("subCategoryAddButton3").style.display = "block";

    e.preventDefault();
    var result;
    category_id2 = $(this).val();
    document.getElementById("category2").value = category_id2;
    getSubCatData2(category_id2);
});


function getSubCatData2(categoryId2) {
    var subcategory = new Array();
    $.ajax({
        type: "GET",
        url: '/api/category/' + categoryId2,
        dataType: 'json',
        success: function (result) {
            $.each(result, function (index, item) {
                var itemObj = {};
                itemObj.value = item.name;
                itemObj.description = item.description;
                itemObj.initials = '',
                itemObj.id = item.id;
                itemObj.initialsState = '',
                itemObj.class = 'tagify__tag--secondary'
                subcategory.push(itemObj);
            });
             bindSubCat2(subcategory);
        }
    });
}


// For Category 3

function addCategory3()
{
    $(".profile_category3_select option[value=" + category_id2 + "]").remove();
    document.getElementById("subCategoryAddButton3").style.display = "none";
    document.getElementById("categorySection3").style.display = "block";
}

function bindSubCat3(subcat_data) {
    jQuery(document).ready(function () {
        var toEl = document.getElementById('kt_tagify_sub3');
            var tagifyTo = new Tagify(toEl, {
                delimiters: ", ", // add new tags when a comma or a space character is entered
                maxTags: 10,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
                whitelist: subcat_data,
                templates: {
                    dropdownItem: function (tagData) {
                        try {
                            var html = '';

                            html += '<div class="tagify__dropdown__item">';
                            html += '   <div class="d-flex align-items-center">';
                            html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                            html += '           <span class="symbol-label">' + (tagData.initials ? tagData.initials : '') + '</span>';
                            html += '       </span>';
                            html += '       <div class="d-flex flex-column">';
                            html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                            html += '           <span class="text-muted font-weight-bold">' + (tagData.description ? tagData.description : '') + '</span>';
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
                    classname: "color-blue",
                    enabled: 0,
                    maxItems: 5
                }
            });
    });
}

$(document).on('change','.profile_category3_select', function (e) {
    document.getElementById("category3_selector").style.display = "none";
    document.getElementById("subCategory3_label").innerHTML = $('.profile_category3_select option:selected').text();
    document.getElementById("subCategory3_selector").style.display = "block";

    e.preventDefault();
    var result;
    category_id3 = $(this).val();
    document.getElementById("category3").value = category_id3;
    getSubCatData3(category_id3);
});


function getSubCatData3(categoryId3) {
    var subcategory = new Array();
    $.ajax({
        type: "GET",
        url: '/api/category/' + categoryId3,
        dataType: 'json',
        success: function (result) {
            $.each(result, function (index, item) {
                var itemObj = {};
                itemObj.value = item.name;
                itemObj.description = item.description;
                itemObj.id = item.id;
                itemObj.initials = '',
                itemObj.initialsState = '',
                itemObj.class = 'tagify__tag--secondary'
                subcategory.push(itemObj);
            });
             bindSubCat3(subcategory);
        }
    });
}