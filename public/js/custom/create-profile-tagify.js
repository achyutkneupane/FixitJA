function bindSubCat1(data, subcat) {
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
                    html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                    html += '           <span class="text-muted font-weight-bold">' + (tagData.description ? tagData.description : '') + '</span>';
                    html += '       </div>';
                    html += '   </div>';
                    html += '</div>';

                    return html;
                } catch (err) {}
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        },
    });

}

$(document).on('change', '.category-select', function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    var subcatid = this.getAttribute('subcatid');
    if ($('#divTagify' + subcatid + '').find('tags').length > 0) {
        $('#divTagify' + subcatid + '').find('tags').remove();
    }
    var category_id = $(this).val();
    getSubCatData(category_id, subcatid);
});


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
                itemObj.description = item.description;
                itemObj.id = item.id;
                itemObj.initials = '',
                    itemObj.initialsState = '',
                    itemObj.id = item.id,
                    itemObj.class = 'tagify__tag--primary'
                subcategory.push(itemObj);
            });
            bindSubCat1(subcategory, subcatid);


        }

    });



}

function bindSubCat2(data, subcat) {
    var toEl = document.getElementById(subcat);
    var tagifyTo1 = new Tagify(toEl, {
        delimiters: ", ", // add new tags when a comma or a space character is entered
        maxTags: 10,
        blacklist: ["fuck", "shit", "pussy"],
        keepInvalidTags: false, // do not remove invalid tags (but keep them marked as invalid)
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
                    html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (tagData.value ? tagData.value : '') + '</a>';
                    html += '           <span class="text-muted font-weight-bold">' + (tagData.description ? tagData.description : '') + '</span>';
                    html += '       </div>';
                    html += '   </div>';
                    html += '</div>';
                    return html;
                } catch (err) {}
            }
        },
        transformTag: function (tagData) {
            tagData.class = 'tagify__tag tagify__tag--primary';
        },
        dropdown: {
            classname: "color-blue",
            enabled: 0,
            maxItems: 5
        },
    });
    /* fetching subcategory id */
    var result = sessionSubCatId;
    var subcat = [];
    Object.keys(result).forEach((key) => {
        result[key].forEach((element,index)=>{
            subcat.push(element);
        });
    });
    for (i = 0; i < subcat.length; i++) {
        data.forEach((element, index) => {
            if (element.id === subcat[i]) {
                if (element) {
                    tagifyTo1.addTags([element]);
                }


            }

        });

    }

}

var category = sessionCatId;
var count = 0;
var catid;
var updatesubcatid = new Array();
Object.keys(category).forEach((key) => {
    var subcatid = "kt_tagify_subcategory" + ++count;
    $("#totalCatList").val($("#totalCatList").val() + '{"fieldId": "'+count+'"},');
    getSubCatData1(category[key], subcatid);
});

function getSubCatData1(categoryId, subcat) {
    var subcategory = new Array();
    var count = 0;
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
            bindSubCat2(subcategory, subcat);
        }
    });
}